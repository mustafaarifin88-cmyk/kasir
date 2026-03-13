<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Auth::index');
$routes->get('/auth', 'Auth::index');
$routes->post('/auth/login', 'Auth::login');
$routes->get('/auth/logout', 'Auth::logout');

$routes->group('admin', ['filter' => 'admin'], static function ($routes) {
    $routes->get('dashboard', 'Admin\Dashboard::index');

    $routes->get('setting', 'Admin\Setting::index');
    $routes->post('setting/update', 'Admin\Setting::update');

    $routes->get('dataadmin', 'Admin\DataAdmin::index');
    $routes->post('dataadmin/save', 'Admin\DataAdmin::save');
    $routes->post('dataadmin/update/(:num)', 'Admin\DataAdmin::update/$1');
    $routes->get('dataadmin/delete/(:num)', 'Admin\DataAdmin::delete/$1');

    $routes->get('cabang', 'Admin\Cabang::index');
    $routes->post('cabang/save', 'Admin\Cabang::save');
    $routes->post('cabang/update/(:num)', 'Admin\Cabang::update/$1');
    $routes->get('cabang/delete/(:num)', 'Admin\Cabang::delete/$1');

    $routes->get('karyawan', 'Admin\Karyawan::index');
    $routes->post('karyawan/save', 'Admin\Karyawan::save');
    $routes->post('karyawan/update/(:num)', 'Admin\Karyawan::update/$1');
    $routes->get('karyawan/delete/(:num)', 'Admin\Karyawan::delete/$1');

    $routes->get('varian', 'Admin\Varian::index');
    $routes->post('varian/save', 'Admin\Varian::save');
    $routes->post('varian/update/(:num)', 'Admin\Varian::update/$1');
    $routes->get('varian/delete/(:num)', 'Admin\Varian::delete/$1');

    $routes->get('biayatambahan', 'Admin\BiayaTambahan::index');
    $routes->post('biayatambahan/save', 'Admin\BiayaTambahan::save');
    $routes->post('biayatambahan/update/(:num)', 'Admin\BiayaTambahan::update/$1');
    $routes->get('biayatambahan/delete/(:num)', 'Admin\BiayaTambahan::delete/$1');

    $routes->get('persentase', 'Admin\Persentase::index');
    $routes->post('persentase/save', 'Admin\Persentase::save');
    $routes->post('persentase/update/(:num)', 'Admin\Persentase::update/$1');
    $routes->get('persentase/delete/(:num)', 'Admin\Persentase::delete/$1');

    $routes->get('datakasir', 'Admin\DataKasir::index');
    $routes->post('datakasir/save', 'Admin\DataKasir::save');
    $routes->post('datakasir/update/(:num)', 'Admin\DataKasir::update/$1');
    $routes->get('datakasir/delete/(:num)', 'Admin\DataKasir::delete/$1');

    $routes->get('laporan', 'Admin\Laporan::index');
    $routes->get('laporan/cetakPdf', 'Admin\Laporan::cetakPdf');
});

$routes->group('kasir', ['filter' => 'kasir'], static function ($routes) {
    $routes->get('dashboard', 'Kasir\Dashboard::index');

    $routes->get('profile', 'Kasir\Profile::index');
    $routes->post('profile/update', 'Kasir\Profile::update');

    $routes->get('transaksi', 'Kasir\Transaksi::index');
    $routes->post('transaksi/save', 'Kasir\Transaksi::save');

    $routes->get('pinjaman', 'Kasir\Pinjaman::index');
    $routes->post('pinjaman/save', 'Kasir\Pinjaman::save');
    $routes->post('pinjaman/update/(:num)', 'Kasir\Pinjaman::update/$1');
    $routes->get('pinjaman/delete/(:num)', 'Kasir\Pinjaman::delete/$1');

    $routes->get('laporan', 'Kasir\Laporan::index');
    $routes->get('laporan/cetakPdf', 'Kasir\Laporan::cetakPdf');
});