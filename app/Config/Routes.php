<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/users', 'Home::show_users');
$routes->get('/users/(:num)', 'Home::show_users/$1');


$routes->get('/posts', 'Home::show_posts');
$routes->get('/posts/(:num)', 'Home::show_posts/$1');