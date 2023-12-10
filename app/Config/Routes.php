<?php

use App\Controllers\CustomerController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'CustomerController::index');
$routes->post('/', 'CustomerController::index');
$routes->post('/customer/store', 'CustomerController::storeList');
$routes->get('/customer/id/(:num)', 'CustomerController::getOne/$1');
$routes->post('/customer/update', 'CustomerController::updateList');
$routes->post('/customer/delete', 'CustomerController::deleteList');
$routes->post('/delete_all', 'CustomerController::deleteAllList');


$routes->get('/index', 'Home::index');
$routes->get('/login', 'LoginController::index');
