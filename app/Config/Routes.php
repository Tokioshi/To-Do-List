<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->post('search', 'Home::search');

$routes->get('tambah', 'Home::tambah');
$routes->add('tambah/save', 'Home::save');

$routes->get('detail', 'Home::detail');
$routes->get('detail/(:num)', 'Home::detail/$1');

$routes->get('edit', 'Home::edit');
$routes->get('edit/(:num)', 'Home::edit/$1');
$routes->post('edit/update/(:num)', 'Home::update/$1');

$routes->delete('delete/(:num)', 'Home::delete/$1');

$routes->get('selesai/(:num)', 'Home::selesai/$1');
