<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<style>
  .skeleton-banner {
    width: 100%;
    min-height: 131.5px;
    padding: 25px 28px 35px 28px;
    border-radius: 14px;
    overflow: hidden;
    background-color: rgba(74, 81, 87, 1);
    animation: pulse 1.5s infinite alternate;
  }@media (min-width: 768px) {
    .skeleton-banner {
      min-height: 283px;
    }
  }
  .skeleton-fs {
    width: 100%;
    min-height: 80px;
    padding-right: 30px;
    border-radius: 14px;
    overflow: hidden;
    background-color: rgba(74, 81, 87, 1);
    animation: pulse 1.5s infinite alternate;
  }
  .skeleton-card {
    min-height: 150px;
    border-radius: 14px;
    overflow: hidden;
    background-color: rgba(74, 81, 87, 1);
    animation: pulse 1.5s infinite alternate;
  }
  @media (min-width: 768px) {
    .skeleton-card {
      min-height: 210px;
    }
  }
  .skeleton-berita {
    min-height: 180px;
    border-radius: 14px;
    overflow: hidden;
    background-color: rgba(74, 81, 87, 1);
    animation: pulse 1.5s infinite alternate;
  }
  @keyframes pulse {
      0% {
          opacity: 0.6;
      }
      100% {
          opacity: 1;
      }
  }

  .swiper-container {
    width: 100%;
    height: 190px;
    overflow: hidden;
    padding-bottom: 35px;
  }
  @media (min-width: 768px){
      .swiper-container {
        padding: 35px;
        height: 380px;
      }
  }
  @media (min-width: 1024px){
      .swiper-container {
        padding: 35px;
        height: 470px;
      }
  }
  .swiper-slide {
    background-position: center;
    background-size: cover;
    width: 100%;
    height: 100%;
  }
  .swiper-slide img {
    display: block;
    width: 100%;
    height: 100%;
    border-radius: 12px;
  }
  .swiper-pagination {
    position: relative;
    margin-top: 15px;
    height: 48px;
    width: 48px;
  }
  .swiper-pagination-bullet {
    background: #ffffff;
  }
  .swiper-pagination-bullet-active {
    background: var(--background-color);
  }
  
  .swiper-fs {
    width: 100%;
    height: 80px;
    position: relative;
    overflow: hidden;
    padding-right: 30px;
  }
  .swiper-fs .swiper-slide-fs {
    width: 90%;
    border-radius: 14px;
  }
  
  .swiper-fs .swiper-slide-dua {
    width: 90%;
    border-radius: 14px;
   }

  @media (min-width: 768px) {
    .swiper-fs .swiper-slide-fs {
      width: 45%;
      border-radius: 14px;
    }
  }
  
  @media (min-width: 768px) {
    .swiper-fs .swiper-slide-dua {
      width: 45%;
      border-radius: 14px;
    }
  }
  .swiper-fs img {
    width: 60px;
    height: 60px;
    border-radius: 8px;
    position: absolute;
    object-fit: cover;
    left: 10px;
    top: 50%;
    transform: translateY(-50%);
  }
  .swiper-fs .name-fs {
    position: absolute;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    left: 80px;
    top: 20px;
  }
  
  .swiper-fs .subname-fs {
    position: absolute;
    left: 80px;
    bottom: 20px;
  }
  
  
  .animate-flash-flicker {
    animation: flash-flicker 5s linear infinite;
  }
  @keyframes flash-flicker {
    0%, 19.999%, 22%, 62.999%, 64%, 64.999%, 70%, 100% {
    opacity: .99;
    filter: drop-shadow(0 0 1px rgba(255, 145, 77, 1)) drop-shadow(0 0 15px rgba(255, 49, 49, 1)) drop-shadow(0 0 1px rgba(255, 145, 77, 1));
    }
    20%, 21.999%, 63%, 63.999%, 65%, 69.999% {
      opacity: .4;
      filter: none;
    }
  }
  
  .fs-countdown {
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .fs-countdown .time {
    font-size: 1em;
    color: white;
    padding: 0.3em 0.8em;
    background: var(--background-color);
    border-radius: 0.3em;
  }
  .fs-countdown .separator {
    font-size: 1em;
    color: white;
    padding: 0.3em;
  }
    
  .tab {
      padding: 8px 16px;
      border-radius: 20px;
  }
  .tab.active {
    color: #fff;
    background: var(--background-color);
  }
  
  .cards-games {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-column-gap: 12px;
    grid-row-gap: 12px;
  }
  @media (min-width: 640px) {
    .cards-games {
      grid-template-columns: repeat(4, 1fr);
      grid-column-gap: 18px;
      grid-row-gap: 18px;
    }
  }
  @media (min-width: 768px) {
    .cards-games {
      grid-template-columns: repeat(5, 1fr);
      grid-column-gap: 20px;
      grid-row-gap: 20px;
    }
  }
  @media (min-width: 1024px) {
    .cards-games {
      grid-template-columns: repeat(5, 1fr);
      grid-column-gap: 22px;
      grid-row-gap: 22px;
    }
  }
  @media (min-width: 1180px) {
    .cards-games {
      grid-template-columns: repeat(6, 1fr);
      grid-column-gap: 25px;
      grid-row-gap: 25px;
    }
  }
  .card {
    min-height: 150px;
    border-radius: 14px;
    overflow: hidden;
    --tw-bg-opacity: 1;
    background-color: rgb(52 55 59/var(--tw-bg-opacity));
  }
  @media (min-width: 768px) {
    .card {
      height: 210px;
    }
  }
  @media (min-width: 1024px) {
    .card {
      height: 240px;
    }
  }
  
  .overlay {
    height: 30%;
    width: 100%;
    overflow: hidden;
    backdrop-filter: blur(4px);
    -webkit-backdrop-filter: blur(4px);
    transition: all 2s ease;
  }
  .text-produk {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    text-align: center;
  }
  
  .ribbon {
    position: absolute;
    right: -5px; top: -5px;
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
  .bg-section-one {
    background: rgb(30,32,34);
    background: linear-gradient(0deg, rgba(30,32,34,1) 0%, rgba(52,55,59,0.8475623497596154) 100%);
  }
</style>

<div class="main">
  <div class="w-full bg-section-one px-3 py-5 space-y-5">
    <div class="swiper-container" id="banner-swiper">
        <div class="swiper-wrapper flex items-center" id="swiper">
            <div class="skeleton-banner swiper-slide"></div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
    <div class="relative space-y-4">
      <div class="flex">
        <h3 class="inline-flex items-center text-xl font-semibold md:text-3xl text-white">
            F<span>
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16"
                    class="animate-flicker h-6 w-6 animate-flash-flicker text-yellow-400" height="1em" width="1em"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5.52.359A.5.5 0 0 1 6 0h4a.5.5 0 0 1 .474.658L8.694 6H12.5a.5.5 0 0 1 .395.807l-7 9a.5.5 0 0 1-.873-.454L6.823 9.5H3.5a.5.5 0 0 1-.48-.641l2.5-8.5z">
                    </path>
                </svg>
            </span>ASH SALE
        </h3>
        <div class="fs-countdown ms-3">
          <div class="time" id="hours">00</div>
          <div class="separator">:</div>
          <div class="time" id="minutes">00</div>
          <div class="separator">:</div>
          <div class="time" id="seconds">00</div>
        </div>
      </div>
        <div class="swiper-fs">
            <div class="swiper-wrapper swiper-wrapper-fs">
              <div class="skeleton-fs swiper-slide"></div>
            </div>
        </div>
    </div>
  </div>
 
  <div class="w-full max-w-screen-xl px-3 py-6">
    <section>
      <h3 class="mb-3 text-lg font-semibold text-gray-900 dark:text-white">🔥 Lagi Populer</h3>
      <div id="popular-cards-container" class="cards-games">
          <div class="skeleton-card"></div>
          <div class="skeleton-card"></div>
          <div class="skeleton-card"></div>
          <div class="skeleton-card"></div>
          <div class="skeleton-card"></div>
          <div class="skeleton-card"></div>
      </div>
    </section>
    
    <section>
      <div class="flex flex-col gap-3 mt-5">
        <div class="bg-murky-900">
          <ul class="flex flex-nowrap overflow-x-auto text-sm font-medium text-center text-gray-500 dark:text-gray-400 mt-5 mb-3">
          <?php foreach ($kategori as $k) : ?>
            <li class="me-2">
              <a href="#" class="tab inline-block px-4 py-3 font-normal text-white bg-murky-800 rounded-lg whitespace-nowrap" data-category="<?= $k['nama'] ?>">
                <?= $k['nama'] ?>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
        </div>
      
        <div id="cards-container" class="cards-games cards-incategory">
            <div class="skeleton-card"></div>
            <div class="skeleton-card"></div>
            <div class="skeleton-card"></div>
            <div class="skeleton-card"></div>
            <div class="skeleton-card"></div>
            <div class="skeleton-card"></div>
            <div class="skeleton-card"></div>
            <div class="skeleton-card"></div>
            <div class="skeleton-card"></div>
            <div class="skeleton-card"></div>
            <div class="skeleton-card"></div>
            <div class="skeleton-card"></div>
        </div>
      </div>
    </section>
  
    <section class="mt-10">
      <div class="mx-auto max-w-screen-sm text-center mb-8">
        <h2 class="mb-4 text-2xl tracking-tight font-extrabold text-gray-900 dark:text-white">Berita Terkini</h2>
        <p class="font-light text-gray-200 sm:text-xl">Temukan penawaran eksklusif terbaru bersama kami! Dapatkan berita terhangat seputar game dan promo-promo menarik yang siap memanjakan penggemar game!</p>
      </div>
      <div id="berita-container" class="grid gap-8 mb-6 lg:mb-16 md:grid-cols-3">
        <div class="skeleton-berita rounded-lg shadow"></div>
        <div class="skeleton-berita rounded-lg shadow"></div>
        <div class="skeleton-berita rounded-lg shadow"></div>
      </div>
    </section>
  
  </div>
  
  <div id="backdrop" class="hidden fixed inset-0 bg-black bg-opacity-50 mx-auto max-w-screen-xl"></div>
  <button data-modal-target="static-modal" data-modal-toggle="static-modal" class="hidden" type="button">
  </button>
  <div id="static-modal" tabindex="-1" aria-hidden="true" class="hidden flex items-center overflow-y-auto overflow-x-hidden z-50 w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-2xl max-h-full">
          <div class="relative bg-murky-800 rounded-lg shadow">
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                  <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                      News
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="static-modal">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <div class="">
                <?php if ($popUp && isset($popUp['gambar'])) : ?>
                    <img src="<?= base_url('public/img/banner/' . $popUp['gambar']); ?>" alt="<?= $web['web_title'] ?>" loading="lazy"><br>
                    <?php if($popUp['tipe'] === 'popup') : ?>
                    <div class="text-sm text-white"><?= $popUp['pesan'] ?>
                    <?php else : ?><?php endif; ?>
                <?php endif; ?>
              </div>
              <div class="flex items-start p-4">
                  <div class="flex items-center h-5">
                      <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-600 dark:border-gray-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required />
                  </div>
                  <label for="jangan tampilkan lagi" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Jangan Tampilkan Lagi</label>
              </div>
          </div>
      </div>
  </div>
</div>

<script>

  var swiperContainer = new Swiper('.swiper-container', {
    slidesPerView: "auto",
    spaceBetween: 20,
    loop: false,
    loopAdditionalSlides: 3,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
  });
  
  var swiperFs = new Swiper('.swiper-fs', {
    slidesPerView: "auto",
    spaceBetween: 20,
    loop: false,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
  });
  
  document.addEventListener('DOMContentLoaded', function () {
    const tabs = document.querySelectorAll('.tab');
    const cardsContainer = document.querySelector('.cards-incategory');

    tabs[0].classList.add('active');

    tabs.forEach(tab => {
      tab.addEventListener('click', function (event) {
        event.preventDefault();

        tabs.forEach(t => t.classList.remove('active'));
        this.classList.add('active');

        const selectedCategory = this.getAttribute('data-category');

        cardsContainer.querySelectorAll('.card').forEach(card => {
          const cardCategory = card.getAttribute('data-category');
          card.style.display = cardCategory === selectedCategory || selectedCategory === 'Semua' ? 'flex' : 'none';
        });
      });
    });

    const activeCategory = tabs[0].getAttribute('data-category');
    cardsContainer.querySelectorAll('.card').forEach(card => {
      const cardCategory = card.getAttribute('data-category');
      card.style.display = cardCategory === activeCategory || activeCategory === 'Semua' ? 'flex' : 'none';
    });
  });
  
    // Load Banner
  function loadBanners() {
    $.ajax({
        url: '<?= base_url('BannersGet') ?>',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            $('#swiper').empty();
            
            response.forEach(function(banner) {
                $('#swiper').append(
                    '<div class="swiper-slide">' +
                    '<img src="<?= base_url('img/banner/') ?>' + banner.gambar + '" alt="<?= $web['web_title'] ?>" loading="lazy">' +
                    '</div>'
                );
            });
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
  }
  
  $(document).ready(function() {
      loadBanners();
  });
  
    // Load Flash Sale
function loadFlashSale() {
    $.ajax({
        url: '<?= base_url('FlashSaleGet') ?>',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            $('.swiper-wrapper-fs').empty();

            response.produkFs.forEach(function(produkFs) {
                var gamesFs = response.gamesFs.find(function(game) {
                    return game.brand === produkFs.brand;
                });

                if (gamesFs) {
                    $('.swiper-wrapper-fs').append(
                        '<div onclick="location.href=\'order/' + gamesFs.slug + '\'" class="swiper-slide swiper-slide-fs bg-murky-800">' +
                        '<div class="ribbon"><span>' + produkFs.persen_diskon + '% OFF</span></div>' +
                        '<img src="<?= base_url('img/games/') ?>' + gamesFs.gambar + '" alt="Gambar" />' +
                        '<div class="name-fs text-white text-sm font-semibold flex flex-nowrap">' + produkFs.nama + '</div>' +
                        '<div class="subname-fs text-gray-300 text-xs">' + produkFs.brand + '</div>' +
                        '</div>'
                    );
                }
            });
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}

$(document).ready(function() {
    loadFlashSale();
});

  
  // Load Games Populer
  function loadPopularGames() {
    $.ajax({
        url: '<?= base_url('PopularGamesGet') ?>',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            $('#popular-cards-container').empty();

            response.forEach(function(game) {
                $('#popular-cards-container').append(
                    '<div onclick="location.href=\'<?= base_url('order/') ?>' + game.slug + '\'" class="card relative flex flex-col items-center shadow">' +
                    '<img class="object-cover w-full h-full" src="<?= base_url(); ?>img/games/' + game.gambar + '" alt="' + game.nama + '" loading="lazy">' +
                    '<div class="overlay absolute bottom-0 w-full px-2 py-1">' +
                    '<p class="text-xs md:text-xl font-bold text-white whitespace-nowrap text-produk">' + game.nama + '</p>' +
                    '<p class="text-xs md:text-sm font-normal text-gray-300 text-produk">' + game.sub_nama + '</p>' +
                    '</div>' +
                    '</div>'
                );
            });
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
  }
  
  $(document).ready(function() {
      loadPopularGames();
  });
  
  // Load Games
  function loadGames() {
      $.ajax({
          url: '<?= base_url('GamesGet') ?>',
          type: 'POST',
          dataType: 'json',
          success: function(response) {
              $('#cards-container').empty();
  
              response.forEach(function(game) {
                  $('#cards-container').append(
                      '<div onclick="location.href=\'<?= base_url('order/') ?>' + game.slug + '\'" class="card card-tabs relative flex flex-col items-center shadow" data-category="' + game.kategori + '">' +
                      '<img class="object-cover w-full h-full" src="<?= base_url(); ?>img/games/' + game.gambar + '" alt="' + game.nama + '" loading="lazy">' +
                      '<div class="overlay absolute bottom-0 w-full px-2 py-1">' +
                      '<p class="text-xs md:text-xl font-bold text-white whitespace-nowrap text-produk">' + game.nama + '</p>' +
                      '<p class="text-xs md:text-sm font-normal text-gray-300 text-produk">' + game.sub_nama + '</p>' +
                      '</div>' +
                      '</div>'
                  );
              });
  
              updateCardDisplay();
          },
          error: function(xhr, status, error) {
              console.error(xhr.responseText);
          }
      });
  }
  
  function updateCardDisplay() {
      const activeCategory = document.querySelector('.tab.active').getAttribute('data-category');
  
      document.querySelectorAll('.card-tabs').forEach(card => {
          const cardCategory = card.getAttribute('data-category');
          card.style.display = cardCategory === activeCategory || activeCategory === 'Semua' ? 'flex' : 'none';
      });
  }

  document.addEventListener('DOMContentLoaded', function () {
      const tabs = document.querySelectorAll('.tab');
  
      tabs[0].classList.add('active');
  
      tabs.forEach(tab => {
          tab.addEventListener('click', function (event) {
              event.preventDefault();
  
              tabs.forEach(t => t.classList.remove('active'));
              this.classList.add('active');
  
              updateCardDisplay();
          });
      });
  
      loadGames();
  });
  
  // Load News
  function loadNews() {
    $.ajax({
      url: '<?= base_url('NewsGet') ?>',
      type: 'POST',
      dataType: 'json',
      success: function(response) {
        $('#berita-container').empty();

        response.forEach(function(berita) {
          $('#berita-container').append(
            '<div onclick="location.href=\'<?= base_url('news/') ?>' + berita.slug + '\'" class="items-center bg-murky-800 rounded-lg shadow">' +
            '<img class="w-full rounded-t-lg" src="<?= base_url(); ?>img/berita/' + berita.gambar + '" alt="' + berita.judul + '">' +
            '<div class="p-5">' +
            '<h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">' +
            berita.judul +
            '</h3>' +
            '</div>' +
            '</div>'
          );
        });
      },
      error: function(xhr, status, error) {
        console.error(xhr.responseText);
      }
    });
  }

  $(document).ready(function() {
    loadNews();
  });
  
  class Countdown {
    constructor(element) {
      this.element = element;
      this.updateTargetDate();
      this.updateCountdown();
      this.interval = setInterval(() => this.updateCountdown(), 1000);
    }
  
    updateTargetDate() {
      this.targetDate = new Date();
      this.targetDate.setHours(24, 0, 0, 0);
      if (this.targetDate.getTime() <= Date.now()) {
        this.targetDate.setDate(this.targetDate.getDate() + 1);
      }
    }
  
    updateCountdown() {
      const now = new Date().getTime();
      const remainingTime = this.targetDate - now;
      const hours = Math.floor((remainingTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      const minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);
  
      this.element.querySelector("#hours").innerHTML = this.formatTime(hours);
      this.element.querySelector("#minutes").innerHTML = this.formatTime(minutes);
      this.element.querySelector("#seconds").innerHTML = this.formatTime(seconds);
  
      if (remainingTime < 0) {
        this.updateTargetDate();
      }
    }
  
    formatTime(time) {
      return time < 10 ? "0" + time : time;
    }
  }
  
  const countdownElement = document.querySelector(".fs-countdown");
  const countdown = new Countdown(countdownElement);
</script>

<?= $this->endSection() ?>