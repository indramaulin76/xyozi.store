<!doctype html>
<html lang="en" class="dark">
  <head>
    <?php $assetBase = rtrim(str_replace('/index.php', '', base_url()), '/'); ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="rgba(30, 32, 34, 1)">
    <base href="<?= base_url() ?>">
    
    <title><?= $web['web_title'] ?> - <?= $web['web_description'] ?></title>
    <meta name="description" content="<?= $web['web_description'] ?>">
    <meta name="keywords" content="<?= $web['web_keywords'] ?>">
    <meta name="author" content="<?= $web['web_author'] ?>">
    <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>/img/web/<?= $web['web_icon'] ?>">
    
    <!-- NEW CSS -->
    <link rel="stylesheet" href="<?= base_url('css/main.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/sweetalert2.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/toastify.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('new/assets/css/swiper.min.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('css/datatable.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

    <!-- NEW JS -->
    <script src="<?= base_url('js/swiper-bundle.min.js') ?>"></script>
    <script src="<?= base_url('js/main.min.js') ?>"></script>
    <script src="<?= base_url('js/sweetalert2.all.min.js') ?>"></script>
    <script src="<?= base_url('new/assets/libs/jquery/dist/jquery.min.js') ?>"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="<?= base_url('js/jquery.dataTables.min.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
        
    <style>
    @import    url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@600;800&display=swap');


  body {
  font-family: 'Plus Jakarta Sans', sans-serif;
      
  } 
  
    :root {
      --text-color: linear-gradient(to right, #FF3131, #FF914D);
      --background-color: linear-gradient(to right, #FF3131, #FF914D);
      --border-color: #FF3131;
    }
    
    body {
      color: #fff;
    }
    
    .progress-container {
            width: 300px;
            background-color: #2d2d2d;
            padding: 20px;
            border-radius: 10px;
            color: white;
        }
        .progress-step {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .progress-step:last-child {
            margin-bottom: 0;
        }
        .step-icon {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 10px;
        }
        .step-icon.completed {
            background-color: #4CAF50; /* Warna hijau untuk status selesai */
        }
        .step-icon.in-progress {
            background-color: #FF9800; /* Warna oranye untuk status pembayaran */
        }
        .step-icon.pending {
            background-color: #333; /* Warna abu untuk status menunggu */
        }
        .step-icon.expired {
            background-color: #cf2020; /* Warna merah untuk status expired */
        }
        .step-text {
            font-size: 16px;
        }
        .step-text .subtext {
            font-size: 12px;
            color: #bbb;
        }
    
    .bg-title-product {
        --tw-bg-opacity: 1;
        background-color: rgb(52 55 59/var(--tw-bg-opacity));
        --tw-text-opacity: 1;
        color: rgb(255 255 255/var(--tw-text-opacity));
        background-image: url('img/card/bg-title-product.svg');
        background-repeat: repeat-x;
        background-position: top;
        background-size: clamp(60em,100rem,100em) auto,cover;
    }
    .bg-murky-300 {
        --tw-bg-opacity: 1;
        background-color: rgb(157 165 171/var(--tw-bg-opacity));
    }
    .bg-murky-600 {
        --tw-bg-opacity: 1;
        background-color: rgb(74 81 87/var(--tw-bg-opacity));
    }
    .bg-murky-700 {
        --tw-bg-opacity: 1;
        background-color: rgb(61 67 72/var(--tw-bg-opacity));
    }
    .bg-murky-800 {
        --tw-bg-opacity: 1;
        background-color: rgb(52 55 59/var(--tw-bg-opacity));
    }
    .bg-murky-900 {
        background-color: rgba(30, 32, 34, 1);
    }
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
    .border-murky-800 {
        --tw-border-opacity: 1;
        border-color: rgb(52 55 59/var(--tw-border-opacity));
    }
    .border-murky-800\/75 {
        border-color: rgba(52,55,59,.75);
    }
    
    .content {
      margin-top: 55px;
      max-width: 100%;
    }
    @media only screen and (min-width: 768px) {
        .content {
          margin-top: 85px;
        }
    }
    .x-bg-g {
      background: var(--background-color);
    }
    .x-btn-g {
      background-image: var(--background-color);
    }
    .x-color-g {
      background: var(--text-color);
      -webkit-background-clip: text;
      background-clip: text;
      -webkit-text-fill-color: transparent;
      text-fill-color: transparent;
    }
    .x-border {
      border-color: var(--border-color);
    }
    .lazy-image {
      filter: blur(10px);
      transition: filter 0.5s ease-in-out;
    }
    .lazy-image.loaded {
      filter: blur(0);
    }
    
    #searchResults {
        display: none;
        position: absolute;
        width: 100%;
        margin-top: 65px;
        z-index: 999;
        overflow: auto;
        background: rgba(30, 32, 34, 1);
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    }
    @media only screen and (min-width: 768px) {
        #searchResults {
            width: 100%;
            margin-top: 27px;
            padding: 0px 20px;
            position: fixed;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
        }
    }
    #searchInput:not(:placeholder-shown) + #searchResults {
        display: block;
    }
    .search-result a {
        display: flex;
        align-items: center;
        padding: 10px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.3);
    }
    .result-image {
        max-width: 80px;
        height: 55px;
        margin-right: 10px;
        border-radius: 8px;
    }
    .result-name {
        margin: 0;
        margin-left: 5px;
        flex: nowrap;
    }
    #backdrop {
    backdrop-filter: blur(8px);
    }
    #static-modal {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        align-items: center;
        justify-content: center;
    }
    
    .img-games-invoice img {
      height: 80%;
      width: 80%;
      border-radius: 12px;
    }
    
    .select-check {
      border-top-left-radius: 12px;
      border-bottom-right-radius: 6px;
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
    
    .text-ellipsis {
      max-width: 30px;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    
    .waves {
  position:relative;
  width: 100%;
  height:15vh;
  margin-bottom:-7px; /*Fix for safari gap*/
  min-height:100px;
  max-height:150px;
}

.parallax > use {
  animation: move-forever 25s cubic-bezier(.55,.5,.45,.5)     infinite;
}
.parallax > use:nth-child(1) {
  animation-delay: -2s;
  animation-duration: 7s;
}
.parallax > use:nth-child(2) {
  animation-delay: -3s;
  animation-duration: 10s;
}
.parallax > use:nth-child(3) {
  animation-delay: -4s;
  animation-duration: 13s;
}
.parallax > use:nth-child(4) {
  animation-delay: -5s;
  animation-duration: 20s;
}
@keyframes move-forever {
  0% {
   transform: translate3d(-90px,0,0);
  }
  100% { 
    transform: translate3d(85px,0,0);
  }
}
/*Shrinking for mobile*/
@media (max-width: 768px) {
  .waves {
    height:40px;
    min-height:40px;
  }
    </style>
    
<!-- TikTok Pixel Code Start -->
<script>
!function (w, d, t) {
  w.TiktokAnalyticsObject=t;var ttq=w[t]=w[t]||[];ttq.methods=["page","track","identify","instances","debug","on","off","once","ready","alias","group","enableCookie","disableCookie","holdConsent","revokeConsent","grantConsent"],ttq.setAndDefer=function(t,e){t[e]=function(){t.push([e].concat(Array.prototype.slice.call(arguments,0)))}};for(var i=0;i<ttq.methods.length;i++)ttq.setAndDefer(ttq,ttq.methods[i]);ttq.instance=function(t){for(
var e=ttq._i[t]||[],n=0;n<ttq.methods.length;n++)ttq.setAndDefer(e,ttq.methods[n]);return e},ttq.load=function(e,n){var r="https://analytics.tiktok.com/i18n/pixel/events.js",o=n&&n.partner;ttq._i=ttq._i||{},ttq._i[e]=[],ttq._i[e]._u=r,ttq._t=ttq._t||{},ttq._t[e]=+new Date,ttq._o=ttq._o||{},ttq._o[e]=n||{};n=document.createElement("script")
;n.type="text/javascript",n.async=!0,n.src=r+"?sdkid="+e+"&lib="+t;e=document.getElementsByTagName("script")[0];e.parentNode.insertBefore(n,e)};


  ttq.load('CUEBMV3C77UF169RUM0G');
  ttq.page();
}(window, document, 'ttq');
</script>
<!-- TikTok Pixel Code End -->
    
  </head>
  <body class="bg-murky-900 w-full min-h-screen max-w-screen-xl mx-auto">
    
    <nav class="bg-murky-900 border-b border-murky-800 fixed w-full z-50 top-0 max-w-screen-xl mx-auto">
      <div class="flex flex-wrap items-center px-3 py-2">
        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" aria-label="navigation" type="button" class="bg-murky-900 inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg hover:bg-murky-900 focus:outline-none md:hidden">
          <svg class="w-6 h-6"  fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
             <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
          </svg>
        </button>
        <a href="<?= base_url() ?>" class="flex ml-3 space-x-1 items-center">
            <img src="<?= base_url('img/web/' . $web['web_logo']) ?>" class="h-8" alt="<?= $web['web_title'] ?> - <?= $web['web_description'] ?>" loading="lazy" />
        </a>
        <div class="flex ms-auto md:order-2 space-x-2 md:space-x-3">
          <button type="button" data-collapse-toggle="navbar-search" aria-label="search" aria-controls="navbar-search" aria-expanded="false" class="flex items-center justify-center md:hidden text-white  hover:bg-murky-900 focus:outline-none rounded-lg text-sm border border-murky-800 w-10 h-10">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"  class="h-5 w-5"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path></svg>
          </button>
          <?php if ($userLogin): ?>
          <button type="button" class="flex items-center justify-between text-white bg-murky-800 hover:bg-murky-800 focus:outline-none rounded-lg border border-transparent text-sm px-3 py-2" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown-mobile" data-dropdown-placement="bottom">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"  class="h-5 w-5"><path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"></path></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"  class="-mr-1 ml-2 h-5 w-5"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd"></path></svg>
          </button>
            <div class="z-50 hidden my-4 text-base list-none bg-murky-800 divide-y divide-gray-700 dark:divide-gray-600 rounded-lg shadow" id="user-dropdown-mobile">
              <div class="px-4 py-3 space-y-2">
                <span class="block text-sm text-white">Telah masuk sebagai</span>
                <span class="block text-sm text-gray-200"><?= $user['username'] ?></span>
              </div>
              <div class="px-4 py-3">
                <span class="block text-sm text-white"><?= 'Rp ' . number_format($user['balance'], 0, ',', '.') ?></span>
              </div>
              <ul class="py-2" aria-labelledby="user-menu-button">
                <li>
                  <a href="<?= base_url('dashboard') ?>" class="block px-4 py-2 text-sm text-gray-200">Dashboard</a>
                </li>
                <li>
                  <a href="<?= base_url('dashboard/history') ?>" class="block px-4 py-2 text-sm text-gray-200 dark:hover:text-white">Transaksi</a>
                </li>
                <li>
                  <a href="<?= base_url('dashboard/akun') ?>" class="block px-4 py-2 text-sm text-gray-200">Pengaturan</a>
                </li>
                <li>
                  <a href="<?= base_url('logout') ?>" class="block px-4 py-2 text-sm text-gray-200">Keluar</a>
                </li>
              </ul>
            </div>
            <?php else: ?>
            <div class="hidden md:flex space-x-2">
              <a href="<?= base_url('masuk') ?>" type="button" class="flex text-white x-bg-g font-medium rounded-lg text-sm max-w-fit px-8 py-2 gap-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Masuk</a>
              <a href="<?= base_url('daftar') ?>" type="button" class="flex text-white x-bg-g font-medium rounded-lg text-sm max-w-fit px-8 py-2 gap-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Daftar</a>
            </div>
          <?php endif; ?>
            <button id="theme-toggle" type="button" class="hidden flex items-center justify-center text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none rounded-lg border border-gray-100 dark:border-gray-700 text-sm w-10 h-10" aria-label="Toggle Theme">
              <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
              <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
          </button>
        </div>
        <div class="flex ms-auto hidden w-full md:flex md:w-auto md:space-x-8 md:order-1" id="navbar-search">
          <div class="w-full relative mt-3 md:mt-0">
            <input type="text" id="searchInput" class="custom-input block ps-10 w-full" placeholder="Search...">
          </div>
        </div>
      </div>
      <div class="max-w-screen-xl px-6 py-3 mx-auto hidden md:block">
          <div class="flex items-center">
              <ul class="flex overflow-hidden overflow-x-auto font-medium mt-2 space-x-4 text-sm">
                  <li>
                      <a href="<?= base_url() ?>" class="text-gray-900 dark:text-white hover:underline flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="flex-shrink-0 w-5 h-5 text-gray-900 transition duration-75 dark:text-white group-hover:text-gray-900 dark:group-hover:text-white" ><rect width="7" height="9" x="3" y="3" rx="1"></rect><rect width="7" height="5" x="14" y="3" rx="1"></rect><rect width="7" height="9" x="14" y="12" rx="1"></rect><rect width="7" height="5" x="3" y="16" rx="1"></rect></svg>
                        <span class="ms-2 whitespace-nowrap">Beranda</span>
                      </a>
                  </li>
                  <li>
                      <a href="<?= base_url('cari-pesanan') ?>" class="text-gray-900 dark:text-white hover:underline flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="flex-shrink-0 w-5 h-5 text-gray-900 transition duration-75 dark:text-white group-hover:text-gray-900 dark:group-hover:text-white" ><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></svg>
                        <span class="ms-2 whitespace-nowrap">Cari Pesanan</span>
                      </a>
                  </li>
                  <!--<li>
                      <a href="<?= base_url('ordermlbb/mlbb') ?>" class="text-gray-900 dark:text-white hover:underline flex items-center">
                        <i class="fa-solid fa-gamepad text-gray-900 w-5 transition duration-75 dark:text-white group-hover:text-gray-900 dark:group-hover:text-white"></i>
                        <span class="ms-2 whitespace-nowrap">MLBB</span>
                      </a>
                  </li>-->
                  <li>
                      <a href="<?= base_url('service') ?>" class="text-gray-900 dark:text-white hover:underline flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="flex-shrink-0 w-5 h-5 text-gray-900 transition duration-75 dark:text-white group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true"><line x1="8" x2="21" y1="6" y2="6"></line><line x1="8" x2="21" y1="12" y2="12"></line><line x1="8" x2="21" y1="18" y2="18"></line><line x1="3" x2="3.01" y1="6" y2="6"></line><line x1="3" x2="3.01" y1="12" y2="12"></line><line x1="3" x2="3.01" y1="18" y2="18"></line></svg>
                        <span class="ms-2 whitespace-nowrap">Daftar Layanan</span>
                      </a>
                  </li>
                  <li>
                      <a href="<?= base_url('kontak') ?>" class="text-gray-900 dark:text-white hover:underline flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="flex-shrink-0 w-5 h-5 text-gray-900 transition duration-75 dark:text-white group-hover:text-gray-900 dark:group-hover:text-white" ><path d="M3 14h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-7a9 9 0 0 1 18 0v7a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3"></path></svg>
                        <span class="ms-2 whitespace-nowrap">Hubungi Kami</span>
                      </a>
                  </li>
                  <li>
                      <a href="<?= base_url('api/docs') ?>" class="text-gray-900 dark:text-white hover:underline flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="flex-shrink-0 w-5 h-5 text-gray-900 transition duration-75 dark:text-white group-hover:text-gray-900 dark:group-hover:text-white" ><path d="m18 16 4-4-4-4"></path><path d="m6 8-4 4 4 4"></path><path d="m14.5 4-5 16"></path></path></svg>
                   <span class="ms-3 whitespace-nowrap">API Docs</span>
                      </a>
                  </li>
                <?php if ($userLogin): ?>
                  <li>
                      <a href="<?= base_url('dashboard') ?>" class="text-gray-900 dark:text-white hover:underline flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="flex-shrink-0 w-5 h-5 text-gray-900 transition duration-75 dark:text-white group-hover:text-gray-900 dark:group-hover:text-white" ><rect width="7" height="9" x="3" y="3" rx="1"></rect><rect width="7" height="5" x="14" y="3" rx="1"></rect><rect width="7" height="9" x="14" y="12" rx="1"></rect><rect width="7" height="5" x="3" y="16" rx="1"></rect></svg>
                   <span class="ms-3 whitespace-nowrap">Dashboard</span>
                      </a>
                  </li>
                  <li>
                      <a href="<?= base_url('dashboard/history') ?>" class="text-gray-900 dark:text-white hover:underline flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="flex-shrink-0 w-5 h-5 text-gray-900 transition duration-75 dark:text-white group-hover:text-gray-900 dark:group-hover:text-white" ><path d="M16 22h2c.5 0 1-.2 1.4-.6.4-.4.6-.9.6-1.4V7.5L14.5 2H6c-.5 0-1 .2-1.4.6C4.2 3 4 3.5 4 4v3"></path><polyline points="14 2 14 8 20 8"></polyline><circle cx="8" cy="16" r="6"></circle><path d="M9.5 17.5 8 16.25V14"></path></svg>
                   <span class="ms-3 whitespace-nowrap">Transaksi</span>
                      </a>
                  </li>
                  <li>
                      <a href="<?= base_url('dashboard/akun') ?>" class="text-gray-900 dark:text-white hover:underline flex items-center">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-900 transition duration-75 dark:text-white group-hover:text-gray-900 dark:group-hover:text-white"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.75 4H19M7.75 4a2.25 2.25 0 0 1-4.5 0m4.5 0a2.25 2.25 0 0 0-4.5 0M1 4h2.25m13.5 6H19m-2.25 0a2.25 2.25 0 0 1-4.5 0m4.5 0a2.25 2.25 0 0 0-4.5 0M1 10h11.25m-4.5 6H19M7.75 16a2.25 2.25 0 0 1-4.5 0m4.5 0a2.25 2.25 0 0 0-4.5 0M1 16h2.25"/>
                     </svg>
                   <span class="ms-3 whitespace-nowrap">Pengaturan</span>
                      </a>
                  </li>
                  <li>
                      <a href="<?= base_url('dashboard/topup') ?>" class="text-gray-900 dark:text-white hover:underline flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="flex-shrink-0 w-5 h-5 text-gray-900 transition duration-75 dark:text-white group-hover:text-gray-900 dark:group-hover:text-white" ><path d="M21 12V7H5a2 2 0 0 1 0-4h14v4"></path><path d="M3 5v14a2 2 0 0 0 2 2h16v-5"></path><path d="M18 12a2 2 0 0 0 0 4h4v-4Z"></path></svg>
                   <span class="ms-3 whitespace-nowrap">Topup Saldo</span>
                      </a>
                  </li>
                <?php endif; ?>
              </ul>
          </div>
      </div>
    </nav>
    
    <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-murky-900 sm:border-r border-murky-800 sm:translate-x-0 md:hidden" aria-label="Sidebar">
       <div class="h-full px-3 pb-4 overflow-y-auto bg-murky-900">
          <ul>
            <h2 class="mb-3 text-xs ml-2 font-medium">MENU</h2>
             <li>
                <a href="<?= base_url() ?>" class="flex items-center p-2 rounded-lg text-white hover:bg-murky-800 group">
                   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="flex-shrink-0 w-5 h-5 text-gray-900 transition duration-75 dark:text-white group-hover:text-gray-900 dark:group-hover:text-white" ><rect width="7" height="9" x="3" y="3" rx="1"></rect><rect width="7" height="5" x="14" y="3" rx="1"></rect><rect width="7" height="9" x="14" y="12" rx="1"></rect><rect width="7" height="5" x="3" y="16" rx="1"></rect></svg>
                   <span class="ms-3 font-normal">Beranda</span>
                </a>
             </li>
             <li>
                <a href="<?= base_url('cari-pesanan') ?>" class="flex items-center p-2 rounded-lg text-white hover:bg-murky-800 group">
                   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="flex-shrink-0 w-5 h-5 text-gray-900 transition duration-75 dark:text-white group-hover:text-gray-900 dark:group-hover:text-white" ><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></svg>
                   <span class="ms-3 whitespace-nowrap font-normal">Cek Transaksi</span>
                </a>
             </li>
             <!--<li>
                <a href="<?= base_url('ordermlbb/mlbb') ?>" class="flex items-center p-2 rounded-lg text-white hover:bg-murky-800 group">
                    <i class="fa-solid fa-gamepad text-gray-900 w-5 transition duration-75 dark:text-white group-hover:text-gray-900 dark:group-hover:text-white"></i>
                   <span class="ms-3 whitespace-nowrap font-normal">MLBB</span>
                </a>
             </li>-->
             <li>
                <a href="<?= base_url('service') ?>" class="flex items-center p-2 rounded-lg text-white hover:bg-murky-800 group">
                   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="flex-shrink-0 w-5 h-5 text-gray-900 transition duration-75 dark:text-white group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true"><line x1="8" x2="21" y1="6" y2="6"></line><line x1="8" x2="21" y1="12" y2="12"></line><line x1="8" x2="21" y1="18" y2="18"></line><line x1="3" x2="3.01" y1="6" y2="6"></line><line x1="3" x2="3.01" y1="12" y2="12"></line><line x1="3" x2="3.01" y1="18" y2="18"></line></svg>
                   <span class="ms-3 whitespace-nowrap font-normal">Daftar Layanan</span>
                </a>
             </li>
             <li>
                <a href="<?= base_url('kontak') ?>" class="flex items-center p-2 rounded-lg text-white hover:bg-murky-800 group">
                   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="flex-shrink-0 w-5 h-5 text-gray-900 transition duration-75 dark:text-white group-hover:text-gray-900 dark:group-hover:text-white" ><path d="M3 14h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-7a9 9 0 0 1 18 0v7a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3"></path></svg>
                   <span class="ms-3 whitespace-nowrap font-normal">Hubungi Kami</span>
                </a>
             </li>
             <li>
                <a href="<?= base_url('api/docs') ?>" class="flex items-center p-2 rounded-lg text-white hover:bg-murky-800 group">
                   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="flex-shrink-0 w-5 h-5 text-gray-900 transition duration-75 dark:text-white group-hover:text-gray-900 dark:group-hover:text-white" ><path d="m18 16 4-4-4-4"></path><path d="m6 8-4 4 4 4"></path><path d="m14.5 4-5 16"></path></path></svg>
                   <span class="ms-3 whitespace-nowrap font-normal">API</span>
                </a>
             </li>
            <a>
             <h2 class="mb-3 text-xs ml-2 font-medium mt-4">CHANNEL RESMI</h2>
             </a>
             <li>
                <a href="https://whatsapp.com/channel/0029Vajgxn0E50UZHWlq1S1w" class="flex items-center p-2 rounded-lg text-white hover:bg-murky-800 group">
                   <i class="fa-brands fa-square-whatsapp fa-lg w-5 text-gray-900 transition duration-75 dark:text-white group-hover:text-gray-900 dark:group-hover:text-white"></i>
                   <span class="ms-3 whitespace-nowrap font-normal">Channel Whatsapp</span>
                </a>
             </li>
             <li>
                <a href="https://t.me/RGMOBAa1" class="flex items-center p-2 rounded-lg text-white hover:bg-murky-800 group">
                   <i class="fa-solid fa-paper-plane fa-lg w-5 text-gray-900 transition duration-75 dark:text-white group-hover:text-gray-900 dark:group-hover:text-white"></i>
                   <span class="ms-3 whitespace-nowrap font-normal">Channel Telegram</span>
                </a>
             </li>
             <?php if ($userLogin): ?>
             <h2 class="mb-3 text-xs ml-2 font-medium mt-4">PENGGUNA</h2>
             <li>
                <a href="<?= base_url('dashboard') ?>" class="flex items-center p-2 rounded-lg text-white hover:bg-murky-800 group">
                   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="flex-shrink-0 w-5 h-5 text-gray-900 transition duration-75 dark:text-white group-hover:text-gray-900 dark:group-hover:text-white" ><rect width="7" height="9" x="3" y="3" rx="1"></rect><rect width="7" height="5" x="14" y="3" rx="1"></rect><rect width="7" height="9" x="14" y="12" rx="1"></rect><rect width="7" height="5" x="3" y="16" rx="1"></rect></svg>
                   <span class="ms-3 whitespace-nowrap font-normal">Dashboard</span>
                </a>
             </li>
             <li>
                <a href="<?= base_url('dashboard/history') ?>" class="flex items-center p-2 rounded-lg text-white hover:bg-murky-800 group">
                   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="flex-shrink-0 w-5 h-5 text-gray-900 transition duration-75 dark:text-white group-hover:text-gray-900 dark:group-hover:text-white" ><path d="M16 22h2c.5 0 1-.2 1.4-.6.4-.4.6-.9.6-1.4V7.5L14.5 2H6c-.5 0-1 .2-1.4.6C4.2 3 4 3.5 4 4v3"></path><polyline points="14 2 14 8 20 8"></polyline><circle cx="8" cy="16" r="6"></circle><path d="M9.5 17.5 8 16.25V14"></path></svg>
                   <span class="ms-3 whitespace-nowrap font-normal">Transaksi</span>
                </a>
             </li>
             <li>
                <a href="<?= base_url('dashboard/akun') ?>" class="flex items-center p-2 rounded-lg text-white hover:bg-murky-800 group">
                   <svg class="flex-shrink-0 w-5 h-5 text-gray-900 transition duration-75 dark:text-white group-hover:text-gray-900 dark:group-hover:text-white"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.75 4H19M7.75 4a2.25 2.25 0 0 1-4.5 0m4.5 0a2.25 2.25 0 0 0-4.5 0M1 4h2.25m13.5 6H19m-2.25 0a2.25 2.25 0 0 1-4.5 0m4.5 0a2.25 2.25 0 0 0-4.5 0M1 10h11.25m-4.5 6H19M7.75 16a2.25 2.25 0 0 1-4.5 0m4.5 0a2.25 2.25 0 0 0-4.5 0M1 16h2.25"/>
                     </svg>
                   <span class="ms-3 whitespace-nowrap font-normal">Pengaturan</span>
                </a>
             </li>
             <li>
                <a href="<?= base_url('dashboard/topup') ?>" class="flex items-center p-2 rounded-lg text-white hover:bg-murky-800 group">
                   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="flex-shrink-0 w-5 h-5 text-gray-900 transition duration-75 dark:text-white group-hover:text-gray-900 dark:group-hover:text-white" ><path d="M21 12V7H5a2 2 0 0 1 0-4h14v4"></path><path d="M3 5v14a2 2 0 0 0 2 2h16v-5"></path><path d="M18 12a2 2 0 0 0 0 4h4v-4Z"></path></svg>
                   <span class="ms-3 whitespace-nowrap font-normal">Topup Saldo</span>
                </a>
             </li>
             <li>
                <a href="<?= base_url('logout') ?>" class="flex items-center p-2 rounded-lg text-white hover:bg-murky-800 group">
                   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="flex-shrink-0 w-5 h-5 text-gray-900 transition duration-75 dark:text-white group-hover:text-gray-900 dark:group-hover:text-white" ><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" x2="9" y1="12" y2="12"></line></polyline>
                   <span class="ms-3 whitespace-nowrap font-normal">Keluar</span>
                </a>
             </li>
             <?php else: ?>
             <h2 class="mb-3 text-xs ml-2 font-medium mt-4">PENGGUNA</h2>
             <li>
                <a href="<?= base_url('masuk') ?>" class="flex items-center p-2 rounded-lg text-white hover:bg-murky-800 group">
                   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="flex-shrink-0 w-5 h-5 text-gray-900 transition duration-75 dark:text-white group-hover:text-gray-900 dark:group-hover:text-white" ><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path><polyline points="10 17 15 12 10 7"></polyline><line x1="15" x2="3" y1="12" y2="12"></line></polyline>
                   <span class="ms-3 whitespace-nowrap font-normal">Masuk</span>
                </a>
             </li>
             <li>
                <a href="<?= base_url('daftar') ?>" class="flex items-center p-2 rounded-lg text-white hover:bg-murky-800 group">
                   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="flex-shrink-0 w-5 h-5 text-gray-900 transition duration-75 dark:text-white group-hover:text-gray-900 dark:group-hover:text-white" ><circle cx="12" cy="8" r="5"></circle><path d="M20 21a8 8 0 1 0-16 0"></path></svg>
                   <span class="ms-3 whitespace-nowrap font-normal">Daftar</span>
                </a>
             </li>
             <?php endif; ?>
          </ul>
       </div>
    </aside>

    <div class="content">
      <?= $this->renderSection('content') ?>
    </div>
    
    <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
<defs>
<path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
</defs>
<g class="parallax">
<use xlink:href="#gentle-wave" x="100" y="0" fill="rgba(55,65,81, .1)" />
<use xlink:href="#gentle-wave" x="100" y="3" fill="rgba(55,65,81, .2)" />
<use xlink:href="#gentle-wave" x="100" y="5" fill="rgba(55,65,81, .2)" />
<use xlink:href="#gentle-wave" x="100" y="7" fill="#34373b" />
</g>
</svg>
</div>
    <footer class="bg-murky-800">
        <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
            <div>
              <div class="mb-6">
                  <a href="<?= base_url() ?>" class="flex items-center">
                      <img src="<?= base_url('img/web/' . $web['web_logo']) ?>" class="h-8 me-3" alt="<?= $web['web_title'] ?> - <?= $web['web_description'] ?>" />
                  </a>
                  <div class="mt-5">
                    <span class="text-sm text-white"><?= $web['web_description'] ?>
                  </div>
              </div>
              <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-2">
                  <div>
                      <h2 class="mb-6 text-sm font-semibold uppercase x-color-g">Social Media</h2>
                      <ul class="text-white font-medium">
                          <li class="mb-4">
                              <a href="https://www.instagram.com/<?= $web['instagram'] ?>" class="hover:underline">Instagram</a>
                          </li>
                          <li>
                              <a href="https://www.tiktok.com/@<?= $web['tiktok'] ?>" class="hover:underline">Tiktok</a>
                          </li>
                      </ul>
                  </div>
                  <div>
                      <h2 class="mb-6 text-sm font-semibold uppercase x-color-g">Dukungan</h2>
                      <ul class="text-white font-medium">
                          <li class="mb-4">
                              <a href="https://wa.me/<?= $web['whatsapp_cs'] ?>" class="hover:underline ">WhatsApp</a>
                          </li>
                          <li>
                              <a href="mailto:<?= $web['email'] ?>" class="hover:underline">Email</a>
                          </li>
                      </ul>
                  </div>
              </div>
          </div>
          <hr class="my-6 border-murky-600 sm:mx-auto lg:my-8" />
          <div class="sm:flex sm:items-center sm:justify-between">
              <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href="<?= base_url() ?>" class="hover:underline"><?= $web['web_title'] ?></a>. All Rights Reserved.
              </span>
          </div>
        </div>
    </footer>
  
  <div class="w-full mx-auto max-w-screen-xl">
    <div id="searchResults"></div>
  </div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
      const lazyImages = document.querySelectorAll('.lazy-image');
  
      const lazyLoad = target => {
        const io = new IntersectionObserver((entries, observer) => {
          entries.forEach(entry => {
            if (entry.isIntersecting) {
              const img = entry.target;
              const src = img.getAttribute('data-src');
  
              img.setAttribute('src', src);
              img.classList.add('loaded');
              observer.disconnect();
            }
          });
        });
  
        io.observe(target);
      };
  
      lazyImages.forEach(lazyLoad);
    })
  
  document.addEventListener("DOMContentLoaded", function() {
      var modal = document.getElementById("static-modal");
      var backdrop = document.getElementById("backdrop");
      var closeButton = document.querySelector("[data-modal-hide='static-modal']");
      var rememberCheckbox = document.getElementById("remember");
      var bodyElement = document.body;
  
      function showModal() {
          modal.classList.remove("hidden");
          backdrop.classList.remove("hidden");
          bodyElement.style.overflow = "hidden";
      }
  
      function hideModal() {
          modal.classList.add("hidden");
          backdrop.classList.add("hidden");
          bodyElement.style.overflow = "auto";
      }
  
      function getLocalStorage(key) {
          return localStorage.getItem(key);
      }
  
      function setLocalStorage(key, value) {
          localStorage.setItem(key, value);
      }
  
      var popUpData = <?= json_encode($popUp ?? null); ?>;
  
      if (popUpData) {
          if (!getLocalStorage("hideModal") || getLocalStorage("hideModal") === "false") {
              showModal();
          }
  
          closeButton.addEventListener("click", function() {
              var checkboxChecked = rememberCheckbox.checked;
  
              if (checkboxChecked) {
                  setLocalStorage("hideModal", "true");
              }
              hideModal();
          });
  
          rememberCheckbox.addEventListener("change", function() {
              if (rememberCheckbox.checked) {
                  setLocalStorage("hideModal", "true");
              } else {
                  setLocalStorage("hideModal", "false");
              }
          });
      } else {
          hideModal();
      }
  });

  var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
  var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
  
  if (!localStorage.getItem('color-theme')) {
      themeToggleDarkIcon.classList.remove('hidden');
  } else {
      themeToggleLightIcon.classList.remove('hidden');
  }
  
  var themeToggleBtn = document.getElementById('theme-toggle');
  
  themeToggleBtn.addEventListener('click', function() {
      themeToggleDarkIcon.classList.toggle('hidden');
      themeToggleLightIcon.classList.toggle('hidden');
  
      if (localStorage.getItem('color-theme')) {
          if (localStorage.getItem('color-theme') === 'light') {
              document.documentElement.classList.add('dark');
              localStorage.setItem('color-theme', 'dark');
          } else {
              document.documentElement.classList.remove('dark');
              localStorage.setItem('color-theme', 'light');
          }
      } else {
          document.documentElement.classList.add('dark');
          localStorage.setItem('color-theme', 'dark');
      }
  });
  
  $(document).ready(function () {
      var searchResults = $('#searchResults');
  
      $('#searchInput').on('keyup', function () {
          var keyword = $(this).val().trim();
  
          $.ajax({
              type: 'POST',
              url: '<?= base_url('search-games') ?>',
              data: { keyword: keyword },
              success: function (data) {
                  searchResults.html('');
  
                  if (keyword === '') {
                      searchResults.hide();
                  } else if (data.results.length > 0) {
                      data.results.forEach(function (result) {
                          var imagePath = '<?= $assetBase; ?>/public/img/games/' + result.gambar;
                          var url = '<?= base_url('beli/') ?>' + result.slug;
                          var html = '<div class="search-result">';
                          html += '<a href="' + url + '">';
                          html += '<img src="' + imagePath + '" alt="' + result.nama + '" class="result-image">';
                          html += '<div class=""><p class="result-name text-white">' + result.nama + '</p><p class="result-name text-gray-300 text-xs">' + result.sub_nama + '</p></div>';
                          html += '</a>';
                          html += '</div>';
  
                          searchResults.append(html);
                      });
  
                      var inputPosition = $('#searchInput').position();
                      searchResults.css({
                          top: inputPosition.top + $('#searchInput').outerHeight(),
                          left: inputPosition.left
                      });
  
                      searchResults.show();
                  } else {
                      searchResults.html('').show();
                  }
              }
          });
      });
  });
</script>
  </body>
</html>