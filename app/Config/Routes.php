<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('DashboardController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'DashboardController::index', ['filter' => 'auth']);
$routes->post('/konfirmasi', 'DashboardController::konfirmasi', ['filter' => 'auth']);
$routes->get('/login', 'OtentikasiController::index');
$routes->post('/login', 'OtentikasiController::login');
$routes->get('/logout', 'OtentikasiController::logout');

// Petugas CRUD
$routes->get('/transaksi', 'TransaksiController::index', ['filter' => 'auth']);
$routes->post('/transaksi/tambah', 'TransaksiController::tambah', ['filter' => 'auth']);
$routes->get('/transaksi/selesai/(:num)', 'TransaksiController::selesai/$1', ['filter' => 'auth']);
$routes->get('/transaksi/hapus/(:num)', 'TransaksiController::hapus/$1', ['filter' => 'auth']);
$routes->get('/transaksi/detail/(:num)', 'TransaksiController::detail/$1', ['filter' => 'auth']);

// Admin & Petugas CRUD
$routes->get('/pelanggan', 'PelangganController::index', ['filter' => 'auth']);
$routes->post('/pelanggan/tambah', 'PelangganController::tambah', ['filter' => 'auth']);
$routes->get('/pelanggan/edit/(:num)', 'PelangganController::edit/$1', ['filter' => 'auth']);
$routes->post('/pelanggan/update', 'PelangganController::update', ['filter' => 'auth']);
$routes->get('/pelanggan/hapus/(:num)', 'PelangganController::hapus/$1', ['filter' => 'auth']);

// Admin CRUD
$routes->get('/layanan', 'LayananController::index', ['filter' => 'admin']);
$routes->post('/layanan/tambah', 'LayananController::tambah', ['filter' => 'admin']);
$routes->get('/layanan/edit/(:num)', 'LayananController::edit/$1', ['filter' => 'admin']);
$routes->post('/layanan/update', 'LayananController::update', ['filter' => 'admin']);
$routes->get('/layanan/hapus/(:num)', 'LayananController::hapus/$1', ['filter' => 'admin']);

$routes->get('/petugas', 'PetugasController::index', ['filter' => 'admin']);
$routes->post('/petugas/tambah', 'PetugasController::tambah', ['filter' => 'admin']);
$routes->get('/petugas/hapus/(:num)', 'PetugasController::hapus/$1', ['filter' => 'admin']);


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
