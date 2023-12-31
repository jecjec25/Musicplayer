<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/playmusic', 'MainController::song');
$routes->post('/save', 'MainController::save');
$routes->post('/insert', 'MainController::insert');
$routes->get('/search', 'MainController::search');
$routes->post('/kanta/(:any)', 'MainController::kanta/$1');
$routes->post('/saveMusic', 'MainController::saveMusic');