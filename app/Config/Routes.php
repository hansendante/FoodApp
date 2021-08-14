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
$routes->setDefaultController('Home');
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
$routes->get('/', 'Login::index');
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);
$routes->get('/dashboard/cart', 'Dashboard::cart', ['filter' => 'auth']);
$routes->get('/dashboard/tambah_keranjang/(:any)', 'Dashboard::tambah_keranjang/$1', ['filter' => 'auth']);
$routes->get('/admindashboard', 'DashboardAdmin::admindashboard', ['filter' => 'auth']);
$routes->get('/kasirdashboard', 'DashboardKasir::index', ['filter' => 'auth']);
$routes->get('/pages/home', 'Pages::home', ['filter' => 'auth']);
$routes->get('/pages', 'Pages::home', ['filter' => 'auth']);
$routes->get('/pageskasir/home', 'PagesKasir::home', ['filter' => 'auth']);
$routes->get('/pageskasir', 'PagesKasir::home', ['filter' => 'auth']);
$routes->get('/home', 'Pages::home', ['filter' => 'auth']);
$routes->get('/makanan', 'Makanan::index', ['filter' => 'auth']);
$routes->get('/penjualan', 'Penjualan::index', ['filter' => 'auth']);
$routes->get('/restaurant', 'Restaurant::index', ['filter' => 'auth']);
$routes->get('/transaksi', 'Transaksi::index', ['filter' => 'auth']);
$routes->get('/transaksi/form', 'Transaksi::form', ['filter' => 'auth']);
$routes->get('/makanan/create', 'Makanan::create', ['filter' => 'auth']);
$routes->get('/restaurant/create', 'Restaurant::create', ['filter' => 'auth']);
$routes->get('/makanan/edit/(:segment)', 'Makanan::edit/$1', ['filter' => 'auth']);
$routes->delete('/makanan/(:num)', 'Makanan::delete/$1', ['filter' => 'auth']);
$routes->get('/makanan/(:any)', 'Makanan::detail/$1', ['filter' => 'auth']);
$routes->get('/transaksi/(:any)', 'Transaksi::detail/$1', ['filter' => 'auth']);
$routes->get('/penjualan/tanggal', 'Penjualan::getDataByTanggal', ['filter' => 'auth']);
$routes->delete('/transaksi/(:num)', 'Transaksi::delete/$1', ['filter' => 'auth']);






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
