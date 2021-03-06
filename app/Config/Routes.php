<?php namespace Config;

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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->get("/login","Admin::login");
$routes->get("/login/password","Admin::resetPassword");
$routes->post("/login/password","Admin::resetPassword");
$routes->post("/login","Admin::login");
$routes->get("/quanlybaiviet","Admin::quanlybaiviet");
$routes->get("/quanlychude","Admin::quanlychude");
$routes->post("/quanlychude","Admin::quanlychude");
$routes->get("/quanlybaiviet","Admin::quanlybaiviet");
$routes->post("/quanlybaiviet","Admin::quanlybaiviet");
$routes->post("/xemthem","Home::xemthem");
$routes->add("/baiviet/(:any)","Home::xembaiviet/$1");
$routes->add("/chude/(:any)","Home::chude/$1");
$routes->add("/chude/(:any)/(:any)","Home::chude/$1/$2");
//$routes->group('admin', function($routes)
//{
//
//});


/**
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
