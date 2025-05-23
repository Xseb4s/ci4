<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
// En app/Config/Routes.php
$routes->post('/', 'UserController::create');
$routes->get('/', 'UserController::index');
$routes->put('/update/(:num)', 'UserController::update/$1');
$routes->delete('/(:num)', 'UserController::delete/$1');

