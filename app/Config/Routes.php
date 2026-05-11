<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::login');
$routes->post('/login-process', 'AuthController::loginProcess');
$routes->get('/logout', 'AuthController::logout');
$routes->group('', ['filter' => 'authFilter'], function ($routes) {
    $routes->get('/dashboard', 'DashboardController::index');
    $routes->get('/users', 'UsersController::index');
    $routes->get('/users/new', 'UsersController::new');
    $routes->post('/users', 'UsersController::create');
    $routes->get('/users/(:num)/edit', 'UsersController::edit/$1');
    $routes->put('/users/(:num)', 'UsersController::update/$1');
    $routes->delete('/users/(:num)', 'UsersController::delete/$1');
    $routes->get('/employees', 'EmployeesController::index');
    $routes->get('/employees/new', 'EmployeesController::new');
    $routes->post('/employees', 'EmployeesController::create');
    $routes->get('/employees/(:num)/edit', 'EmployeesController::edit/$1');
    $routes->put('/employees/(:num)', 'EmployeesController::update/$1');
    $routes->delete('/employees/(:num)', 'EmployeesController::delete/$1');
});
