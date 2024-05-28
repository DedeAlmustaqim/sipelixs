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
});
