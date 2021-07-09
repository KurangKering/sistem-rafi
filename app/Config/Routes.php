<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
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
$routes->get('/', 'Home::index');



$routes->get('kata-dasar', 'KataDasarController::index');
$routes->get('kata-dasar/show', 'KataDasarController::show');
$routes->get('kata-dasar/show_all', 'KataDasarController::show_all');
$routes->post('kata-dasar/create_or_update', 'KataDasarController::create_or_update');
$routes->post('kata-dasar/create', 'KataDasarController::create');
$routes->get('kata-dasar/edit', 'KataDasarController::edit');
$routes->post('kata-dasar/update', 'KataDasarController::update');
$routes->get('kata-dasar/delete', 'KataDasarController::delete');

$routes->get('data-uji', 'DataUjiController::index');
$routes->get('data-uji/show', 'DataUjiController::show');
$routes->get('data-uji/show_all', 'DataUjiController::show_all');
$routes->post('data-uji/create_or_update', 'DataUjiController::create_or_update');
$routes->post('data-uji/create', 'DataUjiController::create');
$routes->get('data-uji/edit', 'DataUjiController::edit');
$routes->post('data-uji/update', 'DataUjiController::update');
$routes->get('data-uji/delete', 'DataUjiController::delete');


$routes->get('pengujian', 'PengujianController::index');
$routes->get('pengujian/pengujian_data_uji', 'PengujianController::pengujian_data_uji');
$routes->get('pengujian/pengujian_tunggal', 'PengujianController::pengujian_tunggal');
$routes->get('pengujian/proses_pengujian_data_uji', 'PengujianController::proses_pengujian_data_uji');
$routes->post('pengujian/proses_pengujian_data_uji', 'PengujianController::proses_pengujian_data_uji');
$routes->post('pengujian/proses_pengujian_tunggal', 'PengujianController::proses_pengujian_tunggal');
$routes->get('pengujian/show_all_data_uji_menu_pengujian', 'PengujianController::show_all_data_uji_menu_pengujian');
$routes->get('pengujian/show_all', 'PengujianController::show_all');
$routes->post('pengujian/create', 'PengujianController::create');
$routes->get('pengujian/edit', 'PengujianController::edit');
$routes->post('pengujian/update', 'PengujianController::update');
$routes->get('pengujian/delete', 'PengujianController::delete');
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
