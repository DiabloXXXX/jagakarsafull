<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/tentang', 'Home::tentang');
$routes->get('/visi', 'Home::visi');
$routes->get('/struktur', 'Home::struktur');
$routes->get('/tugas', 'Home::tugas');
$routes->get('/pjlp', 'Home::pjlp');
$routes->get('/lembaga', 'Home::lembaga');
$routes->get('/layanan', 'Home::layanan');

$routes->get('/berita', 'Berita::index');
$routes->get('/berita/(:segment)', 'Berita::detail/$1');

$routes->get('/banjir', 'Home::banjir');

$routes->post('/chatbot', 'Chatbot::handle');
$routes->get('/chatbot', 'Home::chatbot');


// INI ROUTES ADMIN

$routes->get('/dasbor', 'Admin::index', ['filter' => 'authGuard']);
$routes->get('/halaman', 'Admin::halaman', ['filter' => 'authGuard']);

$routes->get('/halaman/editberanda', 'Admin\Beranda::index', ['filter' => 'authGuard']);
$routes->post('/admin/editberanda/store', 'Admin\Beranda::store', ['filter' => 'authGuard']);
$routes->post('/admin/editberanda/update/(:num)', 'Admin\Beranda::update/$1', ['filter' => 'authGuard']);

$routes->get('/adminberita', 'Admin\Berita::index', ['filter' => 'authGuard']);
$routes->get('/pengaturan', 'Admin::pengaturan', ['filter' => 'authGuard']);

$routes->group('admin', function ($routes) {
    $routes->get('berita', 'Admin\Berita::index');
    $routes->post('berita/store', 'Admin\Berita::store');
    $routes->post('berita/update/(:num)', 'Admin\Berita::update/$1');
    $routes->get('berita/delete/(:num)', 'Admin\Berita::delete/$1');
});


// INI ROUTES AUTH

$routes->get('/login', 'Auth::index');
$routes->get('/register', 'Auth::register');
$routes->post('/auth/save', 'Auth::save');
$routes->post('/auth/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');
