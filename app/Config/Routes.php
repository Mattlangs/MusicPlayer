<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/home', 'MusicController::upload');
$routes->get('/upload', 'MusicController::upload');
$routes->post('/upload', 'MusicController::upload');
$routes->get('/upload/(:any)', 'MusicController::upload/$1');
$routes->get('/search_music/(:any)', 'MusicController::search_music/$1');
$routes->get('/create_playlist', 'PlaylistController::create_playlist');
$routes->post('/create_playlist', 'PlaylistController::create_playlist');
$routes->get('/some_action', 'PlaylistController::some_action');
$routes->post('/some_action', 'PlaylistController::some_action');
$routes->get('/add_to_playlist/(:any)', 'PlaylistController::add_to_playlist/$1');
$routes->get('/remove_from_playlist/(:any)', 'PlaylistController::remove_from_playlist/$1');
$routes->get('/playlist', 'PlaylistController::index');
$routes->get('/search_music', 'MusicController::search_music');




