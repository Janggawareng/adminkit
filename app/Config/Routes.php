<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Home
$routes->get('/', 'Home::index');

// API
$routes->get('/api/data_app', 'Api::data_app');

// Login
$routes->post('/login', 'Login::auth');
$routes->get('/logout', 'Login::logout');

// Portal
$routes->get('/portal', 'Portal::index');

// Admin Dashboard
$routes->get('/admin', 'Admin::index');

// Admin App
$routes->get('/admin/app', 'Admin::app');
$routes->post('/admin/app_create', 'Admin::app_create');
$routes->get('/admin/app_detail/(:num)', 'Admin::app_detail/$1');
$routes->post('/admin/app_update/(:num)', 'Admin::app_update/$1');

// Admin User
$routes->get('/admin/user', 'Admin::user');
$routes->post('/admin/user_create', 'Admin::user_create');
$routes->get('/admin/user_detail/(:num)', 'Admin::user_detail/$1');
$routes->post('/admin/user_update/(:num)', 'Admin::user_update/$1');

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
