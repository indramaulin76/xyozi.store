<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(false);
 
$routes->post('callback', 'Callback::callbackSakurupiah');

$routes->group('', ['namespace' => 'App\Controllers\Autentikasi'], function ($routes) {
  $routes->get('masuk', 'Autentikasi::login');
  $routes->post('masuk/validasi', 'Autentikasi::validasiMasuk');
  $routes->get('daftar', 'Autentikasi::daftar');
  $routes->post('daftar/validasi', 'Autentikasi::validasiDaftar');
  $routes->get('reset-password', 'Autentikasi::resetPassword');
  $routes->post('validasi-reset-password', 'Autentikasi::validasiResetPassword');
  $routes->get('verifikasi-otp', 'Autentikasi::otp');
  $routes->post('validasi-otp', 'Autentikasi::validasiOtp');
  $routes->get('new-password', 'Autentikasi::newPassword');
  $routes->post('validasi-new-password', 'Autentikasi::validasiNewPassword');
  $routes->get('logout', 'Autentikasi::logout');
});

$routes->group('', ['namespace' => 'App\Controllers'], function ($routes) {
  // Views
  $routes->get('/', 'View::index');
  $routes->post('BannersGet', 'View::getBanners');
  $routes->post('FlashSaleGet', 'View::getFlashSale');
  $routes->post('PopularGamesGet', 'View::getPopularGames');
  $routes->post('GamesGet', 'View::getGames');
  $routes->post('NewsGet', 'View::getNews');
  $routes->get('order/(:segment)', 'View::buy/$1');
  $routes->get('ordermlbb/(:segment)', 'View::mlbb/$1');
  $routes->get('produk/getProducts/(:segment)', 'View::getProducts/$1');
  $routes->get('news/(:segment)', 'View::berita/$1');
  $routes->get('cari-pesanan', 'View::history');
  $routes->get('cari-pesanan/getLatestTransactions', 'View::getLatestTransactions');
  $routes->get('kontak', 'View::kontak');
  $routes->post('order/getOrderDetails', 'View::getOrderDetails');
  $routes->post('order/prosesPayment', 'Order::payment');
  $routes->get('invoice/(:any)', 'View::invoice/$1');
  $routes->post('search-games', 'View::searchGames');
  $routes->get('api/docs', 'View::apiDocs');
  $routes->get('service', 'View::service');
  $routes->get('getMyService', 'View::getMyService');
});

$routes->group('dashboard', ['namespace' => 'App\Controllers\User'], function ($routes) {
  $routes->get('/', 'View::dashboard');
  $routes->get('history', 'View::history');
  $routes->get('akun', 'View::akun');
  $routes->get('topup', 'View::topup');
  $routes->post('topup/prosesPayment', 'Topup::prosesPayment');
  $routes->get('topup/invoice/(:any)', 'View::invoice/$1');
  
  $routes->post('akun/updatePassword', 'Update::updatePassword');
  $routes->post('akun/updateProfil', 'Update::updateProfil');
});

$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
  // Views
    $routes->get('dashboard', 'View::dashboard');
    
    $routes->get('produk', 'View::produk');
    $routes->post('produk/getProduk', 'View::getProduk');
    $routes->get('produk/edit/(:num)', 'View::editProduk/$1');
    
    $routes->get('banner', 'View::banner');
    $routes->get('kategori', 'View::kategori');
    $routes->get('mlbbkategori', 'View::Mlbbkategori');
    $routes->get('mlbblayanan', 'View::Mlbblayanan');
    
    $routes->get('games', 'View::games');
    $routes->get('games/edit/(:num)', 'View::editGames/$1');
    $routes->post('games/getGames', 'View::getGames');
    
    $routes->get('metode-pembayaran', 'View::metode');
    $routes->get('metode-pembayaran/edit/(:num)', 'View::editMetode/$1');
    
    $routes->get('topup', 'View::topup');
    $routes->post('topup/getTopup', 'View::getTopup');
    $routes->get('topup/edit/(:num)', 'View::editTopup/$1');
    
    $routes->get('pembelian', 'View::pembelian');
    $routes->post('pembelian/getPembelian', 'View::getPembelian');
    $routes->get('pembelian/edit/(:num)', 'View::editPembelian/$1');
    
    $routes->get('api-provider', 'View::apiProvider');
    $routes->get('kontak', 'View::kontak');
    $routes->get('website', 'View::website');
    $routes->get('tema', 'View::tema');
    
    $routes->get('user', 'View::user');
    $routes->post('user/getUser', 'View::getUser');
    $routes->get('user/edit/(:num)', 'View::editUser/$1');
    $routes->get('berita', 'View::berita');
    
    // Update
    $routes->post('website/update', 'Update::updateWebsite');
    $routes->post('tema/update', 'Update::updateTema');
    $routes->post('kontak/update', 'Update::updateKontak');
    $routes->post('user/update/(:num)', 'Update::updateUser/$1');
    $routes->post('produk/update/(:num)', 'Update::updateProduk/$1');
    $routes->post('pembelian/update/(:num)', 'Update::updatePembelian/$1');
    $routes->post('games/update/(:num)', 'Update::updateGames/$1');
    $routes->post('api-provider/update/(:num)', 'Update::updateApiProvider/$1');
    $routes->post('topup/update/(:num)', 'Update::updateTopup/$1');
    $routes->post('metode-pembayaran/update/(:num)', 'Update::updateMetode/$1');
    $routes->post('berita/update/(:num)', 'Update::updateBerita/$1');

    // Tambah
    $routes->post('banner/tambah', 'Tambah::tambahBanner');
    $routes->post('kategori/tambah', 'Tambah::tambahKategori');
    $routes->post('mlbbkategori/tambah', 'Tambah::tambahMlbbKategori');
    $routes->post('produk/tambah', 'Tambah::tambahProduk');
    $routes->post('metode/tambah', 'Tambah::tambahMetode');
    $routes->post('games/tambah', 'Tambah::tambahGames');
    $routes->post('berita/tambah', 'Tambah::tambahBerita');
    
    // Hapus
    $routes->get('banner/hapus/(:segment)', 'Hapus::hapusBanner/$1');
    $routes->get('kategori/hapus/(:segment)', 'Hapus::hapusKategori/$1');
    $routes->get('metode/hapus/(:segment)', 'Hapus::hapusMetode/$1');
    $routes->get('produk/hapus/(:segment)', 'Hapus::hapusProduk/$1');
    $routes->get('games/hapus/(:segment)', 'Hapus::hapusGames/$1');
    $routes->get('pembelian/hapus/(:segment)', 'Hapus::hapusPembelian/$1');
    $routes->get('user/hapus/(:segment)', 'Hapus::hapusUser/$1');
    $routes->get('topup/hapus/(:segment)', 'Hapus::hapusTopup/$1');
    $routes->get('berita/hapus/(:segment)', 'Hapus::hapusBerita/$1');
    
    $routes->post('mlbblayanan/getMlbbProduk', 'View::getMlbbProduk');
    $routes->get('mlbbkategori/hapus/(:segment)', 'Hapus::hapusMlbbKategori/$1');
    $routes->get('mlbblayanan/hapus/(:segment)', 'Hapus::hapusMlbbLayanan/$1');

});

$routes->group('sistem', ['namespace' => 'App\Controllers\Sistem', 'filter' => 'internalKey'], function ($routes) {
    $routes->get('get-produkVip', 'Sistem::getProdukVip');
    $routes->get('update-statusVip', 'Sistem::updateStatusVip');
    $routes->get('get-produkDf', 'Sistem::getProdukDf');
    $routes->get('update-statusDf', 'Sistem::updateStatusDf');
    $routes->get('update-statusAg', 'Sistem::updateStatusAg');
    $routes->get('get-produkVcg', 'Sistem::getProdukVcg');
    $routes->get('update-refundOrder', 'Sistem::refundOrder');
    $routes->get('get-produkRG', 'Sistem::getProdukRG');

});

$routes->group('order', ['namespace' => 'App\Controllers'], function ($routes) {
  $routes->post('cekid', 'Order::cekID');
  $routes->post('prosesPayment', 'Order::payment');
  
});

$routes->get('timezone', 'TimezoneController::index');

$routes->group('api', ['namespace' => 'App\Controllers'], function ($routes) {
  $routes->post('profile', 'Api::getProfile');
  $routes->post('service', 'Api::getService');
  $routes->post('status', 'Api::getStatus');
  $routes->post('order', 'Api::order');
  
});