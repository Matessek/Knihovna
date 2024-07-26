<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes 
 */
$routes->get('/', 'Home::index');
$routes->group('o-knihovne', function($routes){
    $routes->add('/','Home::About');
    $routes->add('cenik','Home::PriceList');
});

$routes->get('simple','Light::index');

$routes->get('PresmerovaniKatalog','Home::RedirectCounter');
$routes->get('prispevky','Home::Posts');
$routes->get('prispevky/(:num)','Home::Posts/$1');
$routes->get('prispevek/(:num)','Home::Post/$1');
$routes->get('kontakty','Home::Contacts');
$routes->get('shop','Shop::index');


$routes->group('admin',function($routes){
    $routes->add('/','Admin::index');
    $routes->post('login', 'Admin::Login');
    $routes->post('registrace', 'Admin::Register');
    $routes->add('registrace', 'Admin::Register');
    $routes->add('domu','Admin::Dashboard');
    $routes->get('login','Admin::Login'); 
    $routes->add('prispevky','Admin::News');
    $routes->add('prispevky/(:num)','Admin::News/$1');
    $routes->add('galerie','Admin::Gallery');
    $routes->add('galerie/(:num)','Admin::GalleryDetail/$1');
    $routes->get('galerie/vytvorit-album','Admin::CreateAlbum');
    $routes->post('galerie/pridat/(:num)','Admin::AddPhotos/$1');
    $routes->get('galerie/smazat-fotky/(:num)','Admin::DeletePhotos/$1');
    $routes->add('novy-uzivatel','Admin::NewUser');
    $routes->add('logout','Admin::Logout');
    $routes->post('ulozit-prispevek','Admin::Save');
    $routes->add('smazat/(:num)','Admin::Delete/$1');
    $routes->add('nastaveni-webu','Admin::WebSettings');
    $routes->post('nastaveni-webu','Admin::SaveSettings');

});

$routes->get('aktuality/(:num)','News::index/$1');
$routes->get('aktuality','News::index');
$routes->get('aktuality/detail/(:num)','News::Detail/$1');


$routes->get('galerie/(:num)','Gallery::index/$1');
$routes->get('galerie','Gallery::index');
$routes->get('galerie/album/(:num)','Gallery::Album/$1');
$routes->get('galerie/album','Gallery::index');
$routes->get('galerie/album/foto/(:num)','Gallery::Detail/$1');
