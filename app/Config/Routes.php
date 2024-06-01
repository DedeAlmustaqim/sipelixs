<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Auth::sigin');
$routes->post('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');
$routes->get('/register', 'Auth::index');
$routes->get('/register/verifikasi/(:any)', 'Auth::verifikasi/$1');
$routes->post('/register', 'Auth::register');

$routes->group('dashboard',  function ($routes) {
    $routes->get('/', 'Dashboard::index');
});

$routes->group('service',  function ($routes) {
    $routes->get('get_kecamatan', 'Service\LokasiService::getKecamatanJson/$1');
    $routes->get('get_desa/(:alphanum)', 'Service\LokasiService::getDesaJson/$1');
    $routes->post('report/user', 'Service\ReportController::store');
    $routes->get('report/user/(:alphanum)', 'Service\ReportController::jsonReport/$1');
    $routes->get('get_reply/(:alphanum)', 'Service\ReportController::jsonReply/$1');
    $routes->get('get_unit/', 'Service\UnitController::getUnitJson');
    $routes->get('get_petugas/(:alphanum)', 'Service\UnitController::getPetugas/$1');
    $routes->get('show_detail_report/(:alphanum)', 'Service\ReportController::jsonDetailReport/$1');
});

$routes->group('admin',  function ($routes) {
    $routes->get('dashboard', 'Admin\Dashboard::index');
    $routes->get('laporan_masuk', 'Admin\ReportController::laporan_masuk');
    $routes->get('monitoring', 'Admin\ReportController::monitoring');
    $routes->get('json_report', 'Admin\ReportController::jsonReport');
    $routes->get('json_monitoring', 'Admin\ReportController::jsonMonitoring');
    $routes->post('report', 'Admin\ReportController::store');
   
});
