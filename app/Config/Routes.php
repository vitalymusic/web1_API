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


// Postu pievienošana

$routes->post('/posts/create', 'Home::add_post');

$routes->post('/posts/update/(:num)', 'Home::update_post/$1');


// Dzēšana
$routes->get('/posts/delete/(:num)', 'Home::delete_post/$1');




// Epastu sūtīšana
$routes->get('/email', 'Emailsender::index');
$routes->post('/email/send', 'Emailsender::send');


// admin panelis
$routes->get('/admin', 'Admin::index');
$routes->get('/admin/users', 'Admin::users');
$routes->get('/admin/posts', 'Admin::posts');
$routes->get('/admin/gallery', 'Admin::gallery');
$routes->get('/admin/logout', 'Admin::logout');
$routes->get('/admin/login', 'Admin::login');
$routes->post('/admin/authorize', 'Admin::authorize');
$routes->post('/admin/gallery/upload', 'Admin::file_upload');
