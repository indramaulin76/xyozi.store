<?= $this->extend('template') ?>
<?= $this->section('content') ?>
<?php
  $assetBase = rtrim(str_replace('/index.php', '', base_url()), '/');
  $assetPrefix = is_file(FCPATH . 'css/main.min.css') ? '' : 'public/';
?>

<style>
.top-content {
  margin-top: -12px;
}
@media (max-width: 768px) {
  .content {
    margin-bottom: 80px;
  }
}
@media (min-width: 640px) {
  .sticky-content {
    position: sticky;
    top: 150px;
    z-index: 1;
  }
}
.rounded-tl-lg {
  border-top-left-radius: 8px;
}
.games-img {
  width: 80px;
  height: 110px;
  border-radius: 14px;
  margin-top: -60px;
}
.my-custom-alert {
    background-color: rgb(52, 55, 59, 1);
    color: #fff;
}

.ribbon {
  position: absolute;
  right: -7px; top: -7px;
  z-index: 1;
  overflow: hidden;
  width: 75px; height: 75px;
  text-align: right;
}
.ribbon span {
  font-size: 10px;
  font-weight: bold;
  color: #FFF;
  text-transform: uppercase;
  text-align: center;
  line-height: 20px;
  transform: rotate(45deg);
  -webkit-transform: rotate(45deg);
  width: 100px;
  display: block;
  background: #79A70A;
  background: linear-gradient(#F70505 0%, #F70505 100%);
  box-shadow: 0 3px 10px -5px rgba(0, 0, 0, 1);
  position: absolute;
  top: 19px; right: -21px;
}
.ribbon span::before {
  content: "";
  position: absolute; left: 0px; top: 100%;
  z-index: -1;
  border-left: 3px solid #F70505;
  border-right: 3px solid transparent;
  border-bottom: 3px solid transparent;
  border-top: 3px solid #F70505;
}
.ribbon span::after {
  content: "";
  position: absolute; right: 0px; top: 100%;
  z-index: -1;
  border-left: 3px solid transparent;
  border-right: 3px solid #F70505;
  border-bottom: 3px solid transparent;
  border-top: 3px solid #F70505;
}
</style>

<div class="flex flex-col gap-3 w-full max-w-screen-xl">
  <div class="w-full max-w-screen-xl">
    <img class="object-cover w-full" src="<?= $assetBase; ?>/<?= $assetPrefix; ?>img/games/<?= $games['banner'] ?>" alt="<?= $games['nama'] ?>" loading="lazy">
  </div>
  <div class="flex sm:flex-row flex-col gap-3">
    <div class="flex flex-col gap-3 relative w-full">
      <div class="sticky-content">
        <div class="flex items-center gap-3 bg-murky-800 border-y border-murky-600 top-content shadow-2xl p-4">
            <img class="object-cover games-img lazy-image" data-src="<?= $assetBase; ?>/<?= $assetPrefix; ?>img/games/<?= $games['gambar'] ?>" alt="<?= $games['nama'] ?>" loading="lazy">
            <div class="flex flex-col">
                <h5 class="text-xl italic font-medium text-gray-900 dark:text-white"><?= $games['nama'] ?></h5>       
                <p class="text-sm text-gray-300"><?= $games['sub_nama'] ?></p>
                <div class="flex flex-wrap items-center gap-2 gap-x-4 pt-3">
                    <div class="inline-flex items-center space-x-2 text-xs md:text-sm text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="h-3.5 w-3.5 text-yellow-300">
                            <path d="M11.983 1.907a.75.75 0 00-1.292-.657l-8.5 9.5A.75.75 0 002.75 12h6.572l-1.305 6.093a.75.75 0 001.292.657l8.5-9.5A.75.75 0 0017.25 8h-6.572l1.305-6.093z"></path>
                        </svg>
                        <span class="font-semibold text-gray-900 dark:text-white">Proses Cepat</span>
                    </div>
                    <div class="inline-flex items-center space-x-2 text-xs md:text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="h-3.5 w-3.5 text-blue-400">
                            <path fill-rule="evenodd" d="M10 2c-2.236 0-4.43.18-6.57.524C1.993 2.755 1 4.014 1 5.426v5.148c0 1.413.993 2.67 2.43 2.902.848.137 1.705.248 2.57.331v3.443a.75.75 0 001.28.53l3.58-3.579a.78.78 0 01.527-.224 41.202 41.202 0 005.183-.5c1.437-.232 2.43-1.49 2.43-2.903V5.426c0-1.413-.993-2.67-2.43-2.902A41.289 41.289 0 0010 2zm0 7a1 1 0 100-2 1 1 0 000 2zM8 8a1 1 0 11-2 0 1 1 0 012 0zm5 1a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="font-semibold text-gray-900 dark:text-white">Layanan Chat 24/7</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-3 py-2">
          <div class="w-full mt-4 p-4 bg-murky-800 rounded-lg shadow">
            <div class="space-y-3">
              <span class="text-sm font-normal text-gray-900 dark:text-white"><?= $games['informasi'] ?></h5>
              </div>
              <div class="col px-3 mb-4" style="display: flex; align-items: center;">
                         <img src="<?= $assetBase; ?>/<?= $assetPrefix; ?>img/img2/tes.gif" class="gradient-corona-img img-x" alt="" width="50">
                                <marquee width="100%" direction="left" style="flex-grow: 1;">
                                    <span class="mb-0 font-weight-normal"><strong>Proses Otomatis</strong> |</span>
                                <span class="font-weight-normal">Open 24 Jam Nonstop |</span>&nbsp;
                            <span class="mb-0 font-weight-normal">Terimakasih telah berbelanja! </span>
                        </marquee>
                            </div>              
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="flex flex-col gap-3 w-full px-3 py-2">
      <div class="w-full rounded-lg shadow bg-murky-800" id="dataAkun">
        <div class="flex border-b border-gray-200 dark:border-gray-700">
          <div class="flex items-center justify-center rounded-tl-lg x-bg-g px-4 py-2 text-xl font-semibold text-white">1</div>
          <h3 class="flex w-full items-center justify-between px-2 py-2 text-gray-900 dark:text-white font-semibold leading-6 sm:px-4">Masukkan Data Akun</h3>
        </div>
        <div class="space-y-3 p-4">
          <?= $this->include('target/' . $games['tipe_target']); ?>
          <input type="hidden" name="target" id="target" value="<?= $games['validasi_kode'] ?>">
          <div class="mt-2">
            <span class="text-xs text-gray-500 dark:text-gray-300"><?= $games['panduan'] ?></span>
          </div>
        </div>
      </div>
      
      <div class="w-full rounded-lg shadow bg-murky-800" id="dataNominal">
        <div class="flex border-b border-gray-200 dark:border-gray-700">
          <div class="flex items-center justify-center rounded-tl-lg x-bg-g px-4 py-2 text-xl font-semibold text-white">2</div>
          <h3 class="flex w-full items-center justify-between px-2 py-2 text-gray-900 dark:text-white font-semibold leading-6 sm:px-4">Pilih Nominal</h3>
        </div>
        <div class="space-y-3 p-4">
            <?php if (!empty($produk)) : ?>
                <div class="grid grid-cols-2 gap-3 pb-3 pt-3">
                    <?php 
                    $specialProducts = array_filter($produk, function($p) {
                        return $p['tipe'] === 'special';
                    });
            
                    $instantProducts = array_filter($produk, function($p) {
                        return $p['tipe'] === 'instant' || empty($p['tipe']);
                    });
            
                    if (!empty($specialProducts)) {
                        echo '<h2 class="font-semibold col-span-2">🔥 Special Items</h2>';
                        foreach ($specialProducts as $p) {
                            ?>
                            <div class="flex flex-row gap-3">
                                <button onclick="selectProduct('<?= $p['kode_produk'] ?>', '<?= $p['harga'] ?>', '<?= $p['nama'] ?>')" id="productBtn<?= $p['kode_produk'] ?>" class="flex flex-row items-center justify-between rounded-lg p-2 false bg-gray-300 w-full relative group border-2 border-transparent">
                                    <div class="w-full flex justify-between items-center">
                                        <div class="flex flex-col flex-1">
                                            <div class="flex flex-col false">
                                                <span class="text-xs font-semibold text-left line-clamp-4 text-gray-900 dark:text-gray-900"><?= $p['nama'] ?></span>
                                            </div>
                                            <?php if ($p['sts_flash_sale'] === 'Ya') : ?>
                                                <div class="ribbon"><span><?= number_format($p['persen_diskon']) ?>% OFF</span></div>
                                                <span class="text-xs font-medium text-gray-900 text-left line-through mt-2">Rp. <?= number_format($p['harga_jual']) ?></span>
                                                <span id="hargaProduk" class="text-left text-xs font-bold x-color-g line-through text-red-500 py-1">Rp. <?= number_format($p['harga']) ?></span>
                                            <?php else : ?>
                                                <span class="text-left text-xs font-bold x-color-g my-1 mt-2">Rp. <?= number_format($p['harga']) ?></span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="flex items-center ms-auto">
                                            <?php if (!empty($p['logo'])) : ?>
                                                <img src="<?= $assetBase; ?>/<?= $assetPrefix; ?>img/produk/<?= $p['logo']; ?>" class="mx-auto w-8" alt="Logo Produk">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div id="selectedIndicator<?= $p['kode_produk'] ?>" class="absolute right-0 bottom-0 px-2 x-bg-g select-check hidden">
                                        <span class="font-medium line-clamp-1"><i class="fa-solid fa-check text-white"></i></span>
                                    </div>
                                </button>
                            </div>
                            <?php
                        }
                    }
            
                    if (!empty($instantProducts)) {
                        echo '<h2 class="font-semibold col-span-2 mt-3">✨ Top Up Instant</h2>';
                        foreach ($instantProducts as $p) {
                            ?>
                            <div class="flex flex-row gap-3">
                                <button onclick="selectProduct('<?= $p['kode_produk'] ?>', '<?= $p['harga'] ?>', '<?= $p['nama'] ?>')" id="productBtn<?= $p['kode_produk'] ?>" class="flex flex-row items-center justify-between rounded-lg p-2 false bg-gray-300 w-full relative group border-2 border-transparent">
                                    <div class="w-full flex justify-between items-center">
                                        <div class="flex flex-col flex-1">
                                            <div class="flex flex-col false">
                                                <span class="text-xs font-semibold text-left line-clamp-4 text-gray-900 dark:text-gray-900"><?= $p['nama'] ?></span>
                                            </div>
                                            <?php if ($p['sts_flash_sale'] === 'Ya') : ?>
                                                <div class="ribbon"><span><?= number_format($p['persen_diskon']) ?>% OFF</span></div>
                                                <span class="text-xs font-medium text-gray-900 text-left line-through mt-2">Rp. <?= number_format($p['harga_jual']) ?></span>
                                                <span id="hargaProduk" class="text-left text-xs font-bold x-color-g line-through text-red-500 py-1">Rp. <?= number_format($p['harga']) ?></span>
                                            <?php else : ?>
                                                <span class="text-left text-xs font-bold x-color-g my-1 mt-2">Rp. <?= number_format($p['harga']) ?></span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="flex items-center ms-auto">
                                            <?php if (!empty($p['logo'])) : ?>
                                                <img src="<?= $assetBase; ?>/<?= $assetPrefix; ?>img/produk/<?= $p['logo']; ?>" class="mx-auto w-8" alt="Logo Produk">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div id="selectedIndicator<?= $p['kode_produk'] ?>" class="absolute right-0 bottom-0 px-2 x-bg-g select-check hidden">
                                        <span class="font-medium line-clamp-1"><i class="fa-solid fa-check text-white"></i></span>
                                    </div>
                                </button>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            <?php else : ?>
                <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span>Produk sedang tidak tersedia.</span>
                </div>
            <?php endif; ?>
        </div>
      </div>
      
      <div class="w-full rounded-lg shadow bg-murky-800" id="dataMetode">
        <div class="flex border-b border-gray-200 dark:border-gray-700">
          <div class="flex items-center justify-center rounded-tl-lg x-bg-g px-4 py-2 text-xl font-semibold text-white">3</div>
          <h3 class="flex w-full items-center justify-between px-2 py-2 text-gray-900 dark:text-white font-semibold leading-6 sm:px-4">Pilih Pembayaran</h3>
        </div>
        <div class="space-y-3 p-4">
          <div class="grid grid-cols-1 gap-3">
              <?php foreach ($metode as $m) : ?>
                <?php if ($m['kategori'] == 'saldo'): ?>
                  <div class="pb-2">
                    <button id="metodeBtn<?= $m['kode'] ?>" class="relative bg-gray-300 border-2 border-transparent gap-2 flex w-full flex-col rounded-lg p-3">
                        <div class="flex flex-row gap-2 justify-between w-full">
                            <div class="flex items-center space-x-3">
                                <img src="<?= $assetBase; ?>/<?= $assetPrefix; ?>img/metode/<?= $m['gambar'] ?>" alt="<?= $m['nama'] ?>" class="flex flex-col w-8 max-h-4" loading="lazy">
                                <div class="flex flex-col text-left">
                                  <span class="text-md font-bold text-gray-900"><?= $m['nama'] ?></span>
                                  <span class="text-sm italic text-gray-900">
                                    <?php if(isset($user)): ?>
                                    <?= 'Rp ' . number_format($user['balance'], 0, ',', '.') ?>
                                    <?php else: ?>
                                    Anda Harus Login
                                    <?php endif; ?>
                                    </span>
                                </div>
                            </div>
                            <div class="flex flex-col items-end flex-1 justify-center">
                                <span class="text-1xs font-semibold text-left line-clamp-2 x-color-g" id="selectedMetodeHarga<?= $m['kode'] ?>"></span>
                            </div>
                        </div>
                        <div id="selectedMetodeIndicator<?= $m['kode'] ?>" class="absolute right-0 bottom-0 px-2 x-bg-g select-check hidden">
                            <span class="text-[9px] font-medium line-clamp-1"><i class="fa-solid fa-check text-white"></i></span>
                        </div>
                    </button>
                  </div>
                <?php endif; ?>
              <?php endforeach; ?>

          </div>
          <div id="accordion-collapse" data-accordion="collapse" class="space-y-3">
            <div class="shadow rounded-lg">
              <h2 id="accordion-collapse-heading-ewallet">
                <button type="button" class="flex items-center justify-between w-full p-4 font-medium rtl:text-right text-white rounded-t-lg bg-murky-600 hover:bg-murky-600 gap-3" data-accordion-target="#accordion-collapse-body-ewallet" aria-expanded="false" aria-controls="accordion-collapse-body-ewallet">
                  <span class="text-white">E-Wallet</span>
                  <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                  </svg>
                </button>
              </h2>
              <div id="accordion-collapse-body-ewallet" class="hidden bg-murky-600" aria-labelledby="accordion-collapse-heading-ewallet">
                <div class="p-3">
                  <div class="grid grid-cols-2 gap-3">
                  <?php foreach ($metode as $m) : ?>
                    <?php if ($m['kategori'] == 'ewallet'): ?>
                      <div class="pb-2">
                        <button id="metodeBtn<?= $m['kode'] ?>" class="p-3 relative bg-gray-300 border-2 border-transparent gap-2 flex w-full flex-col rounded-lg">
                          <img src="<?= $assetBase; ?>/<?= $assetPrefix; ?>img/metode/<?= $m['gambar'] ?>" alt="<?= $games['nama'] ?>" class="flex flex-col w-16 h-7" loading="lazy">
                          <span class="text-sm font-bold text-left line-clamp-2 x-color-g" id="selectedMetodeHarga<?= $m['kode'] ?>"></span>
                          <span class="text-sm text-gray-900 font-normal text-left"><?= nl2br($m['nama']) ?></span>
                            <div id="selectedMetodeIndicator<?= $m['kode'] ?>" class="absolute right-0 bottom-0 px-2 x-bg-g select-check hidden">
                                <span class="text-[9px] font-medium line-clamp-1"><i class="fa-solid fa-check text-white"></i></span>
                            </div>
                        </button>
                      </div>
                    <?php endif; ?>
                  <?php endforeach; ?>
                  </div>
                </div>
              </div>
              <div class="flex gap-3 p-3 bg-murky-300 rounded-b-lg">
                <?php foreach ($metode as $m) : ?>
                    <?php if ($m['kategori'] == 'ewallet'): ?>
                    <div class="overflow-hidden overflow-x-scroll">
                      <img src="<?= $assetBase; ?>/<?= $assetPrefix; ?>img/metode/<?= $m['gambar'] ?>" alt="<?= $games['nama'] ?>" class="flex flex-col w-10 h-4" loading="lazy">
                    </div>
                    <?php endif; ?>
                <?php endforeach; ?>
              </div>
            </div>
            <div class="shadow rounded-lg">
              <h2 id="accordion-collapse-heading-va">
                <button type="button" class="flex items-center justify-between w-full p-4 font-medium rtl:text-right text-white rounded-t-lg bg-murky-600 hover:bg-murky-600 gap-3" data-accordion-target="#accordion-collapse-body-va" aria-expanded="false" aria-controls="accordion-collapse-body-va">
                  <span class="text-white">Virtual Account</span>
                  <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                  </svg>
                </button>
              </h2>
              <div id="accordion-collapse-body-va" class="hidden bg-murky-600" aria-labelledby="accordion-collapse-heading-va">
                <div class="p-3">
                  <div class="grid grid-cols-2 gap-3">
                  <?php foreach ($metode as $m) : ?>
                    <?php if ($m['kategori'] == 'virtual-account'): ?>
                      <div class="pb-2">
                        <button id="metodeBtn<?= $m['kode'] ?>" class="p-3 relative bg-gray-300 border-2 border-transparent gap-2 flex w-full flex-col rounded-lg">
                          <img src="<?= $assetBase; ?>/<?= $assetPrefix; ?>img/metode/<?= $m['gambar'] ?>" alt="<?= $games['nama'] ?>" class="flex flex-col w-16 h-7" loading="lazy">
                          <span class="text-sm font-bold text-left line-clamp-2 x-color-g" id="selectedMetodeHarga<?= $m['kode'] ?>"></span>
                          <span class="text-sm text-gray-900 font-normal text-left"><?= nl2br($m['nama']) ?></span>
                            <div id="selectedMetodeIndicator<?= $m['kode'] ?>" class="absolute right-0 bottom-0 px-2 x-bg-g select-check hidden">
                                <span class="text-[9px] font-medium line-clamp-1"><i class="fa-solid fa-check text-white"></i></span>
                            </div>
                        </button>
                      </div>
                    <?php endif; ?>
                  <?php endforeach; ?>
                  </div>
                </div>
              </div>
              <div class="flex gap-3 p-3 bg-murky-300 rounded-b-lg">
                <div class="flex overflow-x-auto w-full">
                <?php foreach ($metode as $m) : ?>
                    <?php if ($m['kategori'] == 'virtual-account'): ?>
                    <div class="flex-shrink-0 mr-4">
                      <img src="<?= $assetBase; ?>/<?= $assetPrefix; ?>img/metode/<?= $m['gambar'] ?>" alt="<?= $games['nama'] ?>" class="mr-2 w-10 h-4" loading="lazy">
                    </div>
                    <?php endif; ?>
                <?php endforeach; ?>
                </div>
              </div>
            </div>
            <div class="shadow rounded-lg">
              <h2 id="accordion-collapse-heading-retail">
                <button type="button" class="flex items-center justify-between w-full p-4 font-medium rtl:text-right text-white rounded-t-lg bg-murky-600 hover:bg-murky-600 gap-3" data-accordion-target="#accordion-collapse-body-retail" aria-expanded="false" aria-controls="accordion-collapse-body-retail">
                  <span class="text-white">Convenience Store</span>
                  <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                  </svg>
                </button>
              </h2>
              <div id="accordion-collapse-body-retail" class="hidden bg-murky-600" aria-labelledby="accordion-collapse-heading-retail">
                <div class="p-3">
                  <div class="grid grid-cols-2 gap-3">
                  <?php foreach ($metode as $m) : ?>
                    <?php if ($m['kategori'] == 'retail'): ?>
                      <div class="pb-2">
                        <button id="metodeBtn<?= $m['kode'] ?>" class="p-3 relative bg-gray-300 border-2 border-transparent gap-2 flex w-full flex-col rounded-lg">
                          <img src="<?= $assetBase; ?>/<?= $assetPrefix; ?>img/metode/<?= $m['gambar'] ?>" alt="<?= $games['nama'] ?>" class="flex flex-col w-16 h-7" loading="lazy">
                          <span class="text-sm font-bold text-left line-clamp-2 x-color-g" id="selectedMetodeHarga<?= $m['kode'] ?>"></span>
                          <span class="text-sm text-gray-900 font-normal text-left"><?= nl2br($m['nama']) ?></span>
                            <div id="selectedMetodeIndicator<?= $m['kode'] ?>" class="absolute right-0 bottom-0 px-2 x-bg-g select-check hidden">
                                <span class="text-[9px] font-medium line-clamp-1"><i class="fa-solid fa-check text-white"></i></span>
                            </div>
                        </button>
                      </div>
                    <?php endif; ?>
                  <?php endforeach; ?>
                  </div>
                </div>
              </div>
              <div class="flex gap-3 p-3 bg-murky-300 rounded-b-lg">
                <?php foreach ($metode as $m) : ?>
                    <?php if ($m['kategori'] == 'retail'): ?>
                    <div class="overflow-hidden overflow-x-scroll">
                      <img src="<?= $assetBase; ?>/<?= $assetPrefix; ?>img/metode/<?= $m['gambar'] ?>" alt="<?= $games['nama'] ?>" class="flex flex-col w-10 h-4" loading="lazy">
                    </div>
                    <?php endif; ?>
                <?php endforeach; ?>
              </div>
            </div>
            <div class="shadow rounded-lg">
              <h2 id="accordion-collapse-heading-pulsa">
                <button type="button" class="flex items-center justify-between w-full p-4 font-medium rtl:text-right text-white rounded-t-lg bg-murky-600 hover:bg-murky-600 gap-3" data-accordion-target="#accordion-collapse-body-pulsa" aria-expanded="false" aria-controls="accordion-collapse-body-pulsa">
                  <span class="text-white">Pulsa</span>
                  <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                  </svg>
                </button>
              </h2>
              <div id="accordion-collapse-body-pulsa" class="hidden bg-murky-600" aria-labelledby="accordion-collapse-heading-pulsa">
                <div class="p-3">
                  <div class="grid grid-cols-2 gap-3">
                  <?php foreach ($metode as $m) : ?>
                    <?php if ($m['kategori'] == 'pulsa'): ?>
                      <div class="pb-2">
                        <button id="metodeBtn<?= $m['kode'] ?>" class="p-3 relative bg-gray-300 border-2 border-transparent gap-2 flex w-full flex-col rounded-lg">
                          <img src="<?= $assetBase; ?>/<?= $assetPrefix; ?>img/metode/<?= $m['gambar'] ?>" alt="<?= $games['nama'] ?>" class="flex flex-col w-16 h-7" loading="lazy">
                          <span class="text-sm font-bold text-left line-clamp-2 x-color-g" id="selectedMetodeHarga<?= $m['kode'] ?>"></span>
                          <span class="text-sm text-gray-900 font-normal text-left"><?= nl2br($m['nama']) ?></span>
                            <div id="selectedMetodeIndicator<?= $m['kode'] ?>" class="absolute right-0 bottom-0 px-2 x-bg-g select-check hidden">
                                <span class="text-[9px] font-medium line-clamp-1"><i class="fa-solid fa-check text-white"></i></span>
                            </div>
                        </button>
                      </div>
                    <?php endif; ?>
                  <?php endforeach; ?>
                  </div>
                </div>
              </div>
              <div class="flex gap-3 p-3 bg-murky-300 rounded-b-lg">
                <?php foreach ($metode as $m) : ?>
                    <?php if ($m['kategori'] == 'pulsa'): ?>
                    <div class="overflow-hidden overflow-x-scroll">
                      <img src="<?= $assetBase; ?>/<?= $assetPrefix; ?>img/metode/<?= $m['gambar'] ?>" alt="<?= $games['nama'] ?>" class="flex flex-col w-10 h-4" loading="lazy">
                    </div>
                    <?php endif; ?>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="w-full rounded-lg shadow bg-murky-800" id="dataKontak">
        <div class="flex border-b border-gray-200 dark:border-gray-700">
          <div class="flex items-center justify-center rounded-tl-lg x-bg-g px-4 py-2 text-xl font-semibold text-white">4</div>
          <h3 class="flex w-full items-center justify-between px-2 py-2 text-gray-900 dark:text-white font-semibold leading-6 sm:px-4">Detail Kontak</h3>
        </div>
        <div class="space-y-3 p-4">
          <label for="uid" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor WhatsApp</label>
          <input type="number" name="whatsapp" id="whatsapp" class="custom-input block w-full mb-2" value="" placeholder="Masukan Nomor WhatsApp" required>
          <span class="text-xs text-gray-500 dark:text-gray-300">Bukti pembayaran atas pembelianmu akan kami kirimkan ke WhatsApp.</span>
        </div>
      </div>
      
      <div class="w-full rounded-lg shadow bg-murky-800">
        <div class="flex border-b border-gray-200 dark:border-gray-700">
          <div class="flex items-center justify-center rounded-tl-lg x-bg-g px-4 py-2 text-xl font-semibold text-white">5</div>
          <h3 class="flex w-full items-center justify-between px-2 py-2 text-gray-900 dark:text-white font-semibold leading-6 sm:px-4">Detail Pembelian</h3>
        </div>
        <div class="space-y-3 p-4">
          <div id="selectedProductInfo" class="w-full rounded-lg shadow bg-murky-800">
            <div class="space-y-3">
              <div class="flex flex-col justify-center">
                <span id="selectedProductNama" class="sm:text-lg text-gray-900 dark:text-white false font-semibold"></span>
                <span id="selectedProductHarga" class="sm:text-lg font-semibold x-color-g falsel"></span>
              </div>
              <div class="flex flex-col items-center gap-2">
                <button onclick="placeOrder()" id="btn-order" class="x-bg-g w-full text-white text-sm h-12 px-3 py-2 hover:opacity-80 rounded-md justify-center items-center gap-2 inline-flex">
                  <i class="fa-solid fa-money-bill-wave"></i>
                  <span class="font-medium line-clamp-1">Lanjutkan Pembayaran</span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

<script>
    var selectedProductCode = "";
    var selectedMetodeCode = "";
    var selectedMetodeName = "";
    
    var borderColor = getComputedStyle(document.documentElement).getPropertyValue('--border-color');

    function selectProduct(kodeProduk, hargaJual, namaProduk) {
        <?php foreach ($produk as $p) : ?>
          document.getElementById('productBtn<?= $p['kode_produk'] ?>').style.border = '2px solid transparent';
          document.getElementById('productBtn<?= $p['kode_produk'] ?>').classList.remove('bg-white');
          document.getElementById('productBtn<?= $p['kode_produk'] ?>').classList.add('bg-gray-300');
          document.getElementById('selectedIndicator<?= $p['kode_produk'] ?>').classList.add('hidden');
        <?php endforeach; ?>
          document.getElementById('productBtn' + kodeProduk).style.border = '2px solid ' + borderColor;
          document.getElementById('productBtn' + kodeProduk).classList.remove('bg-gray-300');
          document.getElementById('productBtn' + kodeProduk).classList.add('bg-white');
          document.getElementById('selectedIndicator' + kodeProduk).classList.remove('hidden');

        selectedProductCode = kodeProduk;

        document.getElementById('selectedProductHarga').innerText = 'Rp. ' + Number(hargaJual).toLocaleString();
        document.getElementById('selectedProductNama').innerText = namaProduk;

        <?php foreach ($metode as $m) : ?>
            document.getElementById('selectedMetodeHarga<?= $m['kode'] ?>').innerText = 'Rp. ' + Number(hargaJual).toLocaleString();
        <?php endforeach; ?>
    }

    <?php foreach ($metode as $m) : ?>
        document.getElementById('metodeBtn<?= $m['kode'] ?>').addEventListener('click', function () {
            handleMetodeSelection('<?= $m['kode'] ?>', '<?= $m['kode'] ?>');
        });
    <?php endforeach; ?>

    function handleMetodeSelection(kodeMetode, namaMetode) {
        <?php foreach ($metode as $m) : ?>
        document.getElementById('metodeBtn<?= $m['kode'] ?>').style.border = '2px solid transparent';
        document.getElementById('selectedMetodeIndicator<?= $m['kode'] ?>').classList.add('hidden');
        document.getElementById('metodeBtn<?= $m['kode'] ?>').classList.remove('bg-white');
        document.getElementById('metodeBtn<?= $m['kode'] ?>').classList.add('bg-gray-300');
        <?php endforeach; ?>
        document.getElementById('metodeBtn' + kodeMetode).style.border = '2px solid ' + borderColor;
        document.getElementById('selectedMetodeIndicator' + kodeMetode).classList.remove('hidden');
        document.getElementById('metodeBtn' + kodeMetode).classList.remove('bg-gray-300');
        document.getElementById('metodeBtn' + kodeMetode).classList.add('bg-white');

        selectedMetodeCode = kodeMetode;
        selectedMetodeName = namaMetode;
    }

    function placeOrder() {
        var uid = document.getElementById("uid").value;
        var server = document.getElementById("server").value;
        var target = document.getElementById("target").value;
        var selectedProductPrice = document.getElementById('selectedProductHarga').innerText.replace('Rp. ', '').replace(/,/g, '').replace(/\./g, '');
        var selectedProductName = document.getElementById('selectedProductNama').innerText;
        var whatsappNumber = document.getElementById("whatsapp").value;
        
        // Joki
        const formJoki = "<?php echo $games['tipe_target']; ?>";
        if (formJoki === 'joki') {
          var emailJoki = document.getElementById("email_joki").value;
          var passwordJoki = document.getElementById("password_joki").value;
          var loginJoki = document.getElementById("login_joki").value;
          var requestJoki = document.getElementById("request_joki").value;
        }
    
        var errorMessages = [];
        
        var notyf = new Notyf({
          duration: 4000,
          position: {
            x: 'right',
            y: 'top',
          },
        });
            
        if (!uid) {
          notyf.error('Harap masukkan semua informasi akun yang diperlukan');
            document.getElementById('dataAkun').scrollIntoView({ behavior: 'smooth' });
            return;
        }
        const tipeTarget = "<?php echo $games['tipe_target']; ?>";
        if (tipeTarget === 'Id-Server' || 'joki') {
            const server = document.getElementById('server').value;
            if (!server) {
              notyf.error('Harap masukkan semua informasi akun yang diperlukan');
                document.getElementById('dataAkun').scrollIntoView({ behavior: 'smooth' });
                return;
            }
        }
        if (!selectedProductCode) {
            notyf.error('Harap pilih nominal item terlebih dahulu');
            document.getElementById('dataNominal').scrollIntoView({ behavior: 'smooth' });
            return;
        }
        if (!selectedMetodeCode) {
            notyf.error('Harap pilih Metode Pembayaran terlebih dahulu');
            document.getElementById('dataMetode').scrollIntoView({ behavior: 'smooth' });
            return;
        }
        if (!whatsappNumber) {
            notyf.error('Harap masukkan nomor WhatsApp terlebih dahulu');
            document.getElementById('dataKontak').scrollIntoView({ behavior: 'smooth' });
            return;
        }
        // Joki
        const tipeJoki = "<?php echo $games['tipe_target']; ?>";
        if (tipeJoki === 'joki') {
            const emailJoki = document.getElementById('email_joki').value;
            if (!emailJoki) {
              notyf.error('Harap masukkan email akun');
                document.getElementById('dataAkun').scrollIntoView({ behavior: 'smooth' });
                return;
            }
            const passwordJoki = document.getElementById('password_joki').value;
            if (!passwordJoki) {
              notyf.error('Harap masukkan password akun');
                document.getElementById('dataAkun').scrollIntoView({ behavior: 'smooth' });
                return;
            }
            const loginJoki = document.getElementById('login_joki').value;
            if (!loginJoki) {
              notyf.error('Harap pilih metode login');
                document.getElementById('dataAkun').scrollIntoView({ behavior: 'smooth' });
                return;
            }
            const requestJoki = document.getElementById('request_joki').value;
            if (!requestJoki) {
              notyf.error('Harap masukkan request ke penjoki');
                document.getElementById('dataAkun').scrollIntoView({ behavior: 'smooth' });
                return;
            }
        }
        
        
    <?php if ($games['validasi_status'] == 'YA'): ?>
      Swal.fire({
        customClass: "my-custom-alert",
        showCancelButton: false,
        showConfirmButton: false,
        allowOutsideClick: false,
        didOpen: () => {
          Swal.showLoading();
          const timer = Swal.getPopup().querySelector("b");
          timerInterval = setInterval(() => {
            timer.textContent = `${Swal.getTimerLeft()}`;
          }, 1000);
        },
        willClose: () => {
          clearInterval(timerInterval);
        }
      });
      fetch('<?= base_url('order/cekid') ?>', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({
          uid: uid,
          server: server,
          target: target,
        }),
      })
      .then(response => {
        if (!response.ok) {
          return response.json().then(data => {
            Swal.fire({
              customClass: "my-custom-alert",
              title: "Error",
              text: `Network response was not ok (HTTP status: ${response.status}): ${data.message || data.error || 'Unknown error'}`,
              icon: "error",
              
            });
          });
        }
        return response.json();
      })
      .then(data => {
        Swal.close();
        if (data.error) {
          Swal.fire({
            title: "Kesalahan",
            text: data.error,
            icon: "warning",
            customClass: "my-custom-alert",
            
          });
        } else if (data.responseData) {
          handleSuccessfulResponse(data.responseData);
        } else {
          throw new Error('Invalid server response structure');
        }
      })
      .catch(error => {
        console.error('Error:', error);
      });
    <?php else: ?>
      Swal.fire({
        title: "Buat Pesanan",
        customClass: "my-custom-alert",
        html: `
          <table class="w-full text-left text-base">
            <tr>
              <th class="whitespace-nowrap pr-4">ID</th>
              <td>: ${uid}</td>
            </tr>
            ${server !== 'NoServer' ? `
                <tr>
                    <th class="whitespace-nowrap pr-4">Server</th>
                    <td>: ${server}</td>
                </tr>` : ''}
            <tr>
              <th class="whitespace-nowrap pr-4">Item</th>
              <td>: ${selectedProductName}</td>
            </tr>
            <tr>
              <th class="whitespace-nowrap pr-4">Harga</th>
              <td>: ${Number(selectedProductPrice).toLocaleString()}</td>
            </tr>
            <tr>
              <th class="whitespace-nowrap pr-4">Payment</th>
              <td>: ${selectedMetodeName}</td>
            </tr>
          </table>
        `,
        icon: "success",
        showCancelButton: true,
        
        cancelButtonColor: "#E02424",
        confirmButtonText: "Bayar Sekarang"
      })
      .then((result) => {
        if (result.isConfirmed) {
          handlePayment();
        }
      })
      .catch(error => {
        handleOrderCreationError(error);
      });
    <?php endif; ?>
    
    function handleSuccessfulResponse(responseData) {
      Swal.fire({
        title: "Buat Pesanan",
        customClass: "my-custom-alert",
        html: `
          <table class="w-full text-left text-base">
            <tr>
              <th class="whitespace-nowrap pr-4">Username</th>
              <td>: ${responseData}</td>
            </tr>
            <tr>
              <th class="whitespace-nowrap pr-4">ID</th>
              <td>: ${uid}</td>
            </tr>
            ${server !== 'NoServer' ? `
            <tr>
                <th class="whitespace-nowrap pr-4">Server</th>
                <td>: ${server}</td>
            </tr>` : ''}
            <tr>
              <th class="whitespace-nowrap pr-4">Item</th>
              <td>: ${selectedProductName}</td>
            </tr>
            <tr>
              <th class="whitespace-nowrap pr-4">Harga</th>
              <td>: ${Number(selectedProductPrice).toLocaleString()}</td>
            </tr>
            <tr>
              <th class="whitespace-nowrap pr-4">Payment</th>
              <td>: ${selectedMetodeName}</td>
            </tr>
          </table>
        `,
        icon: "success",
        showCancelButton: true,
        
        cancelButtonColor: "#E02424",
        confirmButtonText: "Bayar Sekarang"
      })
      .then((result) => {
        if (result.isConfirmed) {
          handlePaymentProcess(responseData);
        }
      })
      .catch(error => {
        handleOrderCreationError(error);
      });
    }
    
    function handlePaymentProcess(responseData) {
      Swal.fire({
        customClass: "my-custom-alert",
        showCancelButton: false,
        showConfirmButton: false,
        allowOutsideClick: false,
        didOpen: () => {
          Swal.showLoading();
          const timer = Swal.getPopup().querySelector("b");
          timerInterval = setInterval(() => {
            timer.textContent = `${Swal.getTimerLeft()}`;
          }, 1000);
        },
        willClose: () => {
          clearInterval(timerInterval);
        }
      });
    
      fetch('<?= base_url('order/prosesPayment') ?>', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({
          uid: uid,
          server: server,
          username: responseData,
          productCode: selectedProductCode,
          productPrice: selectedProductPrice,
          productName: selectedProductName,
          metodeName: selectedMetodeName,
          metodeCode: selectedMetodeCode,
          whatsapp: whatsappNumber,
        }),
      })
      .then(paymentResponse => {
        if (!paymentResponse.ok) {
          throw new Error(`Network response was not ok (HTTP status: ${paymentResponse.status})`);
        }
        return paymentResponse.json();
      })
      .then(responseData => {
        handlePaymentResponse(responseData);
      })
      .catch(error => {
        handlePaymentError(error);
      });
    }
    
    function handlePayment() {
      Swal.fire({
        customClass: "my-custom-alert",
        showCancelButton: false,
        showConfirmButton: false,
        allowOutsideClick: false,
        didOpen: () => {
          Swal.showLoading();
          const timer = Swal.getPopup().querySelector("b");
          timerInterval = setInterval(() => {
            timer.textContent = `${Swal.getTimerLeft()}`;
          }, 1000);
        },
        willClose: () => {
          clearInterval(timerInterval);
        }
      });
    
      fetch('<?= base_url('order/prosesPayment') ?>', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({
          uid: uid,
          server: server,
          username: 'Off',
          productCode: selectedProductCode,
          productPrice: selectedProductPrice,
          productName: selectedProductName,
          metodeName: selectedMetodeName,
          metodeCode: selectedMetodeCode,
          whatsapp: whatsappNumber,
        }),
      })
      .then(paymentResponse => {
        if (!paymentResponse.ok) {
          throw new Error(`Network response was not ok (HTTP status: ${paymentResponse.status})`);
        }
        return paymentResponse.json();
      })
      .then(responseData => {
        handlePaymentResponse(responseData);
      })
      .catch(error => {
        handlePaymentError(error);
      });
    }
    
    function handlePaymentResponse(responseData) {
      if (responseData.success && responseData.orderID) {
        const orderID = responseData.orderID;
        window.location.href = `<?= base_url('invoice/') ?>${orderID}`;
      } else {
        const errorMessage = responseData.message || "Terjadi kesalahan saat memproses pembayaran. Silakan coba lagi nanti.";
        Swal.fire({
          customClass: "my-custom-alert",
          title: "Error",
          text: `${errorMessage}`,
          icon: "error",
          
        });
      }
    }
    
    function handlePaymentError(error) {
      const errorMessage = error.message || "Terjadi kesalahan saat memproses pembayaran. Silakan coba lagi nanti.";
      Swal.fire({
        customClass: "my-custom-alert",
        title: "Error",
        text: `${errorMessage}`,
        icon: "error",
        
      });
    }
    
    function handleOrderCreationError(error) {
      const errorMessage = error.message || "Terjadi kesalahan saat membuat pesanan. Silakan coba lagi nanti.";
      Swal.fire({
        customClass: "my-custom-alert",
        title: "Error",
        text: `Order Creation Error: ${errorMessage}`,
        icon: "error",
        
      });
    }
    
    }
</script>

<?= $this->endSection() ?>