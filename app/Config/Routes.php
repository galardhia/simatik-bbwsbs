<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// 🔹 Rute Autentikasi (Login & Logout)
$routes->get('/', 'Auth::login');
$routes->get('/login', 'Auth::login');
$routes->post('/auth/processLogin', 'Auth::processLogin'); 
$routes->get('/logout', 'Auth::logout');

// 🔹 Rute Dashboard sesuai Role
$routes->get('/dashboard/superadmin', 'Dashboard::superadmin');
$routes->get('/dashboard/adminapbn', 'Dashboard::adminapbn');
$routes->get('/dashboard/adminnonapbn', 'Dashboard::adminnonapbn');

// 🔹 Master Data User
$routes->get('/master-user', 'AdminController::masterUser');
$routes->get('/master-user-view', 'AdminController::masterUser');

$routes->get('api/admins', 'AdminController::getAdmins'); // Ambil data admin
$routes->post('admin/add', 'AdminController::addAdmin'); // Tambah admin
$routes->post('admin/delete/(:num)', 'AdminController::deleteAdmin/$1'); // Hapus admin
$routes->post('admin/save', 'AdminController::save'); // Simpan user

$routes->get('barang/master_data_apbn', 'MasterData::master_data_apbn');
$routes->get('barang/master_data_non_apbn', 'MasterData::master_data_non_apbn');
$routes->get('masterdata/generateQrCode/(:any)/(:any)', 'MasterData::generateQrCode/$1/$2');




