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

$routes->get('/berita', 'Home::berita');
$routes->get('/berita/(:segment)', 'Home::detail_berita/$1');

$routes->get('/prestasi/(:segment)', 'Home::detail_prestasi/$1');

$routes->get('/banjir', 'Home::banjir');
$routes->get('/peta', 'Home::peta');

$routes->post('/chatbot', 'Chatbot::handle');
$routes->get('/chatbot', 'Home::chatbot');
$routes->get('/chatbot/suggestions', 'Chatbot::suggestions');

// PUSH NOTIFICATION ROUTES
$routes->get('/api/vapid-key', 'Notification::getVapidKey');
$routes->post('/api/push/subscribe', 'Notification::subscribe');
$routes->post('/api/push/unsubscribe', 'Notification::unsubscribe');


// ADMIN ROUTES - PROTECTED & CLEAN
$routes->group('admin', ['filter' => 'authGuard'], function ($routes) {
    // Root Admin Redirect
    $routes->get('/', 'Admin::index');
    // Dashboard
    $routes->get('dashboard', 'Admin::index'); // URL: /admin/dashboard
    
    // Activity Log / Riwayat
    $routes->get('riwayat', 'Admin\Riwayat::index');
    
    // Page Management
    $routes->get('halaman', 'Admin::halaman');
    
    // News Management
    $routes->get('berita', 'Admin\Berita::index');
    $routes->get('berita/create', 'Admin\Berita::create');
    $routes->post('berita/store', 'Admin\Berita::store');
    $routes->get('berita/edit/(:num)', 'Admin\Berita::edit/$1');
    $routes->post('berita/update/(:num)', 'Admin\Berita::update/$1');
    $routes->post('berita/delete/(:num)', 'Admin\Berita::delete/$1');
    
    // Prestasi Management
    $routes->get('prestasi', 'Admin\Beranda::index');
    $routes->post('prestasi/store', 'Admin\Beranda::store');
    $routes->post('prestasi/update/(:num)', 'Admin\Beranda::update/$1');
    $routes->post('prestasi/delete/(:num)', 'Admin\Beranda::delete/$1');
    
    // Tugas Management
    $routes->get('tugas', 'Admin\Tugas::index');
    $routes->post('tugas/store', 'Admin\Tugas::store');
    $routes->post('tugas/update/(:num)', 'Admin\Tugas::update/$1');
    $routes->post('tugas/delete/(:num)', 'Admin\Tugas::delete/$1');
    
    // PJLP Management
    $routes->get('pjlp', 'Admin\Pjlp::index');
    $routes->post('pjlp/store', 'Admin\Pjlp::store');
    $routes->post('pjlp/update/(:num)', 'Admin\Pjlp::update/$1');
    $routes->post('pjlp/delete/(:num)', 'Admin\Pjlp::delete/$1');
    
    // Chatbot FAQ Management
    $routes->get('chatbot', 'Admin\ChatbotFaq::index');
    $routes->post('chatbot/store', 'Admin\ChatbotFaq::store');
    $routes->post('chatbot/update/(:num)', 'Admin\ChatbotFaq::update/$1');
    $routes->post('chatbot/delete/(:num)', 'Admin\ChatbotFaq::delete/$1');
    $routes->post('chatbot/toggle-featured/(:num)', 'Admin\ChatbotFaq::toggleFeatured/$1');
    $routes->post('chatbot/toggle-status/(:num)', 'Admin\ChatbotFaq::toggleStatus/$1');
    
    // Edit Pages using Halaman Controller
    $routes->group('halaman', function ($routes) {
        // Prestasi / Beranda
        $routes->get('editberanda', 'Admin\Beranda::index');
        $routes->post('editberanda/store', 'Admin\Beranda::store');
        $routes->post('editberanda/update/(:num)', 'Admin\Beranda::update/$1');
        $routes->post('editberanda/delete/(:num)', 'Admin\Beranda::delete/$1');

        $routes->get('editvisi', 'Admin\Halaman::visi');
        $routes->post('editvisi/update', 'Admin\Halaman::visiupdate');

        $routes->get('editstruktur', 'Admin\Halaman::struktur');
        $routes->post('editstruktur/update', 'Admin\Halaman::strukturupdate');

        $routes->get('editlembaga', 'Admin\Halaman::lembaga');
        $routes->post('editlembaga/update', 'Admin\Halaman::lembagaupdate');

        $routes->get('editlayanan', 'Admin\Halaman::layanan');
        $routes->post('editlayanan/update', 'Admin\Halaman::layananupdate');

        $routes->get('editbanjir', 'Admin\Halaman::banjir');
        $routes->post('editbanjir/update', 'Admin\Halaman::banjirupdate');
        
        // Beranda & Tentang Content
        $routes->get('editberanda-content', 'Admin\Halaman::beranda');
        $routes->post('editberanda-content/update', 'Admin\Halaman::berandaupdate');
    });

    // Notifications
    $routes->get('notification', 'Notification::adminIndex');
    $routes->post('notification/send', 'Notification::sendToAll');

    // Settings
    $routes->get('pengaturan', 'Admin::pengaturan');
    $routes->post('pengaturan/update', 'Admin::update');
    $routes->post('pengaturan/password', 'Admin::password');
});


// AUTH ROUTES - Secured
$routes->get('/login', 'Auth::index');
$routes->post('/auth/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');

// Registration DISABLED for security - admin creation via existing admin only
// $routes->get('/register', 'Auth::register');
// $routes->post('/auth/save', 'Auth::save');
