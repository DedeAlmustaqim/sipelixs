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
$routes->post('/otp', 'Auth::otp');
$routes->get('/register/verifikasi/(:any)', 'Auth::verifikasi/$1');
$routes->post('/register', 'Auth::register');
$routes->get('/admin', 'AdminAuth::index');
$routes->post('/admin/login', 'AdminAuth::login');
$routes->get('/admin/logout', 'AdminAuth::logout');
$routes->group('dashboard',  function ($routes) {
    $routes->get('/', 'Dashboard::index');
});

$routes->group('service',  function ($routes) {
    $routes->get('get_kecamatan', 'Service\LokasiService::getKecamatanJson/$1', ['filter' => 'isAll']);
    $routes->get('get_desa/(:alphanum)', 'Service\LokasiService::getDesaJson/$1', ['filter' => 'isAll']);
    $routes->post('report/user', 'Service\ReportController::store', ['filter' => 'isAll']);
    $routes->get('report/user/(:alphanum)', 'Service\ReportController::jsonReport/$1', ['filter' => 'isAll']);
    $routes->get('get_reply/(:alphanum)', 'Service\ReportController::jsonReply/$1', ['filter' => 'isAll']);
    $routes->get('get_unit/', 'Service\UnitController::getUnitJson', ['filter' => 'isAll']);
    $routes->get('get_petugas/(:alphanum)', 'Service\UnitController::getPetugas/$1', ['filter' => 'isAll']);
    $routes->get('show_detail_report/(:alphanum)', 'Service\ReportController::jsonDetailReport/$1', ['filter' => 'isAll']);
});

$routes->group('admin',  function ($routes) {
    $routes->get('dashboard', 'Admin\Dashboard::dashboard_admin', ['filter' => 'isAdmin']);
    $routes->get('laporan_masuk', 'Admin\ReportController::laporan_masuk', ['filter' => 'isAdmin']);
    $routes->get('monitoring', 'Admin\ReportController::monitoring', ['filter' => 'isAdmin']);
    $routes->get('json_report', 'Admin\ReportController::jsonReport', ['filter' => 'isAdmin']);
    $routes->get('json_monitoring', 'Admin\ReportController::jsonMonitoring', ['filter' => 'isAdmin']);
    $routes->post('report', 'Admin\ReportController::forwardReport', ['filter' => 'isAdmin']);
    $routes->get('reject_report/(:alphanum)', 'Admin\ReportController::rejectReport/$1', ['filter' => 'isAdmin']);
   
});

$routes->group('skpd',  function ($routes) {
    $routes->get('dashboard', 'Admin\Dashboard::dashboard_skpd', ['filter' => 'isSkpd']);
    $routes->get('laporan_masuk', 'Admin\ReportController::laporan_masuk_skpd', ['filter' => 'isSkpd']); //laporan masuk SKPD
    $routes->get('monitoring', 'Admin\ReportController::successReport', ['filter' => 'isSkpd']); //laporan masuk SKPD
    $routes->get('json_report', 'Admin\ReportController::jsonReportSkpd', ['filter' => 'isSkpd']);
    $routes->post('report', 'Admin\ReportController::respondReport', ['filter' => 'isSkpd']); //tanggapi
    $routes->get('json_monitoring', 'Admin\ReportController::jsonMonitoringSkpd', ['filter' => 'isSkpd']);
});

$routes->group('notif',  function ($routes) {
    $routes->get('single_text', 'Service\WaSingleTextController::sendMessage');
    $routes->get('laporan_masuk', 'Admin\ReportController::laporan_masuk_skpd', ['filter' => 'isSkpd']); //laporan masuk SKPD
    $routes->get('monitoring', 'Admin\ReportController::successReport', ['filter' => 'isSkpd']); //laporan masuk SKPD
    $routes->get('json_report', 'Admin\ReportController::jsonReportSkpd', ['filter' => 'isSkpd']);
    $routes->post('report', 'Admin\ReportController::respondReport', ['filter' => 'isSkpd']); //tanggapi
    $routes->get('json_monitoring', 'Admin\ReportController::jsonMonitoringSkpd', ['filter' => 'isSkpd']);
});