<!DOCTYPE html>
<html lang="en" class="dark">
<head>
  <?php $assetBase = rtrim(str_replace('/index.php', '', base_url()), '/'); ?>
  <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="rgba(30, 32, 34, 1)">

	<!-- PAGE TITLE HERE -->
	<title>Admin</title>
	<link rel="icon" type="image/x-icon" href="<?= $assetBase; ?>/public/img/web/<?= $web['web_icon'] ?>">
	
	<!-- CSS -->
	<link rel="stylesheet" href="<?= $assetBase; ?>/public/css/main.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
	<link rel="stylesheet" href="<?= $assetBase; ?>/public/css/datatable.css">
	<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
	
	<!-- JS -->
	<script src="<?= $assetBase; ?>/public/js/main.min.js"></script>
	<script src="<?= $assetBase; ?>/public/new/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="<?= $assetBase; ?>/public/js/jquery.dataTables.min.js"></script>
	<script src="<?= $assetBase; ?>/public/admin/vendor/ckeditor/ckeditor.js"></script>
	<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
	
	<style>
	  .bg-transparent {
        background-color: transparent;
    }
    .border-b .border-y {
        border-bottom-width: 1px;
    }
    .border-transparent {
        border-color: transparent;
    }
    .border-murky-600 {
        --tw-border-opacity: 1;
        border-color: rgb(74 81 87/var(--tw-border-opacity));
    }
    .bg-murky-600 {
        --tw-bg-opacity: 1;
        background-color: rgb(74 81 87/var(--tw-bg-opacity));
    }
    .bg-murky-700 {
        --tw-bg-opacity: 1;
        background-color: rgb(61 67 72/var(--tw-bg-opacity));
    }
    .border-murky-800 {
        --tw-border-opacity: 1;
        border-color: rgb(52 55 59/var(--tw-border-opacity));
    }
    .border-murky-800\/75 {
        border-color: rgba(52,55,59,.75);
    }
    .bg-murky-800 {
        --tw-bg-opacity: 1;
        background-color: rgb(52 55 59/var(--tw-bg-opacity));
    }
    .bg-murky-900 {
        background-color: rgba(30, 32, 34, 1);
    }
    .x-bg-g {
      background: linear-gradient(to right, #FF3131, #FF914D);
    }
    .x-btn-g {
      background-image: linear-gradient(to right, #FF3131, #FF914D);
    }
    .x-color-g {
      background: linear-gradient(to right, #FF3131, #FF914D);
      -webkit-background-clip: text;
      background-clip: text;
      -webkit-text-fill-color: transparent;
      text-fill-color: transparent;
    }
    .custom-input {
      background-color: #D1D5DB;
      color: #010101;
      font-size: 14px;
      border-radius: 8px;
      padding: 5px 12px;
      border: none!important;
      outline: none!important;
    }
    .custom-input:focus {
      background-color: white;
      border: none!important;
      outline: none!important;
      box-shadow: none;
    }
    .dataTables_info {
        color: #fff;
    }
    tbody tr:nth-child(even) {
      background-color: rgba(52,55,59,.75);
    }
    table.dataTable tbody td {
      padding: 10px;
    }
	</style>
	
</head>
<body class="bg-murky-900 mx-auto w-full min-h-screen max-w-screen-xl">
  
  <nav class="bg-murky-900 border-b border-murky-800 fixed w-full z-50 top-0 start-0">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
      <div class="flex items-center justify-between">
        <div class="flex items-center justify-start rtl:justify-end">
          <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="bg-murky-800 inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg hover:bg-murky-800 focus:outline-none md:hidden">
              <span class="sr-only">Open sidebar</span>
              <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                 <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
              </svg>
           </button>
          <a href="<?= base_url('admin/dashboard') ?>" class="flex ms-2 md:me-24">
            <img src="<?= $assetBase; ?>/public/img/web/<?= $web['web_logo'] ?>" class="h-8" alt="Logo" />
          </a>
        </div>
        <div class="flex items-center">
            <div class="flex items-center ms-3">
              <div>
                <button type="button" class="flex text-sm bg-murky-900" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                  <span class="sr-only">Open user menu</span>
                  <i class="fa-solid fa-arrow-right-from-bracket text-xl text-gray-400"></i>
                </button>
              </div>
              <div class="z-50 hidden my-4 text-base list-none bg-murky-700 rounded shadow" id="dropdown-user">
                <ul class="py-1" role="none">
                  <li>
                    <a href="<?= base_url('logout'); ?>" class="block px-4 py-2 text-sm text-red-500" role="menuitem">Sign out</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
      </div>
    </div>
  </nav>

  <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-murky-900 sm:border-r border-murky-800 sm:translate-x-0" aria-label="Sidebar">
     <div class="h-full px-3 pb-4 overflow-y-auto bg-murky-900">
        <ul class="space-y-2 font-medium">
           <li>
              <a href="<?= base_url('admin/dashboard') ?>" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                 <i class="fa-solid fa-house text-xl text-white"></i>
                 <span class="ms-3">Dashboard</span>
              </a>
           </li>
           <li>
            <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-transaksi" data-collapse-toggle="dropdown-transaksi">
                  <i class="fa-solid fa-cart-shopping text-xl text-white"></i>
                  <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Data Transaksi</span>
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                  </svg>
            </button>
            <ul id="dropdown-transaksi" class="hidden py-2 space-y-2">
                  <li>
                     <a href="<?= base_url('admin/pembelian'); ?>" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Pembelian</a>
                  </li>
                  <li>
                     <a href="<?= base_url('admin/topup'); ?>" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Topup</a>
                  </li>
              </ul>
           </li>
           <li>
            <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-layanan" data-collapse-toggle="dropdown-layanan">
                  <i class="fa-solid fa-list text-xl text-white"></i>
                  <span class="flex-1 ms-4 text-left rtl:text-right whitespace-nowrap">Data Layanan</span>
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                  </svg>
            </button>
            <ul id="dropdown-layanan" class="hidden py-2 space-y-2">
                  <li>
                     <a href="<?= base_url('admin/games'); ?>" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Games</a>
                  </li>
                  <li>
                     <a href="<?= base_url('admin/produk'); ?>" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Produk</a>
                  </li>
                  <li>
                     <a href="<?= base_url('admin/kategori'); ?>" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Kategori</a>
                  </li>
                  <!--<li>
                     <a href="<?= base_url('admin/mlbbkategori'); ?>" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">MLBB Kategori</a>
                  </li>
                  <li>
                     <a href="<?= base_url('admin/mlbblayanan'); ?>" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">MLBB Layanan</a>
                  </li>-->
              </ul>
           </li>
           <li>
              <a href="<?= base_url('admin/metode-pembayaran'); ?>" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                 <i class="fa-solid fa-credit-card text-xl text-white"></i>
                 <span class="flex-1 ms-3 whitespace-nowrap">Metode Pembayaran</span>
              </a>
           </li>
           <li>
              <a href="<?= base_url('admin/berita'); ?>" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                 <i class="fa-solid fa-newspaper text-xl text-white"></i>
                 <span class="flex-1 ms-3 whitespace-nowrap">Berita / Artikel</span>
              </a>
           </li>
           <li>
              <a href="<?= base_url('admin/banner'); ?>" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                 <i class="fa-solid fa-image text-xl text-white"></i>
                 <span class="flex-1 ms-3 whitespace-nowrap">Banner / Popup</span>
              </a>
           </li>
           <li>
              <a href="<?= base_url('admin/api-provider'); ?>" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                 <i class="fa-solid fa-microchip text-xl text-white"></i>
                 <span class="flex-1 ms-3 whitespace-nowrap">Api Provider</span>
              </a>
           </li>
           <li>
              <a href="<?= base_url('admin/user'); ?>" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                 <i class="fa-solid fa-user-pen text-xl text-white"></i>
                 <span class="flex-1 ms-2 whitespace-nowrap">Data User</span>
              </a>
           </li>
           <li>
           <li>
            <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-pengaturan" data-collapse-toggle="dropdown-pengaturan">
                  <i class="fa-solid fa-gear text-xl text-white"></i>
                  <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Pengaturan</span>
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                  </svg>
            </button>
            <ul id="dropdown-pengaturan" class="hidden py-2 space-y-2">
                  <li>
                     <a href="<?= base_url('admin/website'); ?>" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Website</a>
                  </li>
                  <!--<li>
                     <a href="<?= base_url('admin/tema'); ?>" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Tema</a>
                  </li>-->
              </ul>
           </li>
        </ul>
     </div>
  </aside>

  <div class="p-4 sm:ml-64" style="margin-top: 75px;">
      <div class="content-body">
          <?= $this->renderSection('content') ?>
      </div>
  </div>

</body>
</html>