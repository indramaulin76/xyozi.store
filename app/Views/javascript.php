
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
                    '<img src="<?= base_url('public/img/banner/') ?>' + banner.gambar + '" alt="<?= $web['web_title'] ?>" loading="lazy">' +
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
        url: '<?= base_url('getFlashSale') ?>',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $('.swiper-wrapper-fs').empty();

            response.produkFs.forEach(function(produkFs) {
                var gamesFs = response.gamesFs.find(function(game) {
                    return game.brand === produkFs.brand;
                });

                if (gamesFs) {
                    $('.swiper-wrapper-fs').append(
                        '<div onclick="location.href=\'beli/' + gamesFs.slug + '\'" class="swiper-slide swiper-slide-fs bg-murky-800">' +
                        '<div class="ribbon"><span>' + produkFs.persen_diskon + '% OFF</span></div>' +
                        '<img src="<?= base_url('public/img/games/') ?>' + gamesFs.gambar + '" alt="Gambar" />' +
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
                    '<div onclick="location.href=\'<?= base_url('beli/') ?>' + game.slug + '\'" class="card relative flex flex-col items-center shadow">' +
                    '<img class="object-cover w-full h-full" src="<?= base_url(); ?>public/img/games/' + game.gambar + '" alt="' + game.nama + '" loading="lazy">' +
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
          url: '<?= base_url('getGames') ?>',
          type: 'GET',
          dataType: 'json',
          success: function(response) {
              $('#cards-container').empty();
  
              response.forEach(function(game) {
                  $('#cards-container').append(
                      '<div onclick="location.href=\'<?= base_url('beli/') ?>' + game.slug + '\'" class="card card-tabs relative flex flex-col items-center shadow" data-category="' + game.kategori + '">' +
                      '<img class="object-cover w-full h-full" src="<?= base_url(); ?>public/img/games/' + game.gambar + '" alt="' + game.nama + '" loading="lazy">' +
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
      url: '<?= base_url('getNews') ?>',
      type: 'GET',
      dataType: 'json',
      success: function(response) {
        $('#berita-container').empty();

        response.forEach(function(berita) {
          $('#berita-container').append(
            '<div onclick="location.href=\'<?= base_url('news/') ?>' + berita.slug + '\'" class="items-center bg-murky-800 rounded-lg shadow">' +
            '<img class="w-full rounded-t-lg" src="<?= base_url(); ?>public/img/berita/' + berita.gambar + '" alt="' + berita.judul + '">' +
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