<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<style>
.dataTables_info {
    display: none;
}

.topup-name {
    color: #404949;
    font-size: 14px;
    margin-left: 5px;
    text-align: left;        /* pastikan isi rata kiri */
}
</style>

<section class="bg-murky-900">
    <div class="flex flex-col items-center justify-center px-4 py-8 mx-auto md:h-screen lg:py-16 space-y-8 md:space-y-16">
      <div class="flex flex-col gap-3 w-full">
        <div class="w-full rounded-lg shadow bg-murky-800 p-5">
          <div class="border-b border-gray-700 pb-3" id="dataNominal">
            <h5 class="text-xl font-medium text-gray-900 dark:text-white">1. Masukkan Nominal</h5>
          </div>
          <div class="mt-3">
            <label for="uid" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nominal Top Up</label>
            <input type="number" name="nominal" id="nominal" class="custom-input block w-full" value="" placeholder="Nominal" required>
          </div>
        </div>
        
        <div class="w-full rounded-lg shadow bg-murky-800 p-5">
          <div class="border-b border-gray-700 pb-3" id="dataMetode">
            <h5 class="text-xl font-medium text-gray-900 dark:text-white">2. Metode Pembayaran</h5>
          </div>
          <div class="grid grid-cols-1 gap-3 pt-3">
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
                              <img data-src="<?= base_url(); ?>public/img/metode/<?= $m['gambar'] ?>" alt="<?= $m['nama'] ?>" class="flex flex-col w-16 max-h-12 lazy-image" loading="lazy">
                               <span class="topup-name"><?= nl2br($m['nama']) ?></span>
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
                          <img data-src="<?= base_url(); ?>public/img/metode/<?= $m['gambar'] ?>" alt="<?= $m['nama'] ?>" class="flex flex-col w-10 max-h-5 lazy-image" loading="lazy">
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
                              <img data-src="<?= base_url(); ?>public/img/metode/<?= $m['gambar'] ?>" alt="<?= $m['nama'] ?>" class="flex flex-col w-16 max-h-12 lazy-image" loading="lazy">
                               <span class="topup-name"><?= nl2br($m['nama']) ?></span>
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
                          <img data-src="<?= base_url(); ?>public/img/metode/<?= $m['gambar'] ?>" alt="<?= $m['nama'] ?>" class="mr-2 w-10 h-4 lazy-image" loading="lazy">
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
                              <img data-src="<?= base_url(); ?>public/img/metode/<?= $m['gambar'] ?>" alt="<?= $m['nama'] ?>" class="flex flex-col w-16 max-h-12 lazy-image" loading="lazy">
                              <span class="topup-name"><?= nl2br($m['nama']) ?></span>
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
                          <img data-src="<?= base_url(); ?>public/img/metode/<?= $m['gambar'] ?>" alt="<?= $m['nama'] ?>" class="flex flex-col w-10 max-h-5 lazy-image" loading="lazy">
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
                              <img data-src="<?= base_url(); ?>public/img/metode/<?= $m['gambar'] ?>" alt="<?= $m['nama'] ?>" class="flex flex-col w-16 max-h-12 lazy-image" loading="lazy">
                              <span class="topup-name"><?= nl2br($m['nama']) ?></span>
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
                          <img data-src="<?= base_url(); ?>public/img/metode/<?= $m['gambar'] ?>" alt="<?= $m['nama'] ?>" class="flex flex-col w-10 max-h-5 lazy-image" loading="lazy">
                        </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
          </div>
          <button onclick="placeTopup()" id="btn-order" class="x-bg-g w-full text-white text-sm h-12 px-3 py-2 hover:opacity-80 rounded-md justify-center items-center gap-2 inline-flex mt-5">
            <i class="fa-solid fa-money-bill-wave"></i>
            <span class="font-medium line-clamp-1">Lanjutkan Pembayaran</span>
          </button>
        </div>
      </div>
      
      <div class="flex flex-col gap-3 w-full">
          <p class="text-2xl font-semibold text-left rtl:text-right text-gray-900 dark:text-white">Riwayat Top Up</p>
          <div class="relative overflow-x-auto">
              <div class="mt-1">
                  <input type="text" id="table-search" class="custom-input block w-full" placeholder="Search...">
              </div>
          </div>
          <div class="relative overflow-x-auto">
              <table class="w-full text-sm text-left rtl:text-right text-white" id="history">
                  <thead class="text-xs text-white whitespace-nowrap">
                      <tr class="border-y border-murky-800 bg-murky-900 whitespace-nowrap">
                          <th scope="col" class="px-6 py-3">
                              #
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Topup ID
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Nominal
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Metode
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Status
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Tanggal
                          </th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($topup as $key => $t): ?>
                          <tr class="border-y border-murky-800 bg-murky-900 whitespace-nowrap">
                              <td class="px-6 py-4">
                                  <?= $key + 1 ?>
                              </td>
                              <td class="px-6 py-4">
                                <a href="<?= base_url('dashboard/topup/invoice/' . $t['topup_id']) ?>" class="x-color-g">
                                  <?= $t['topup_id'] ?>
                                </a>
                              </td>
                              <td class="px-6 py-4">
                                  <?= "Rp " . number_format($t['nominal'], 0, ',', '.') ?>
                              </td>
                              <td class="px-6 py-4">
                                  <?= $t['metode'] ?>
                              </td>
                              <td class="px-6 py-4">
                                <?php if ($t['status'] == 'PAID'): ?>
                                <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300"><?= $t['status'] ?></span>
                                  <?php elseif ($t['status'] == 'Unpaid'): ?>
                                  <span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300"><?= $t['status'] ?></span>
                                  <?php else: ?>
                                  <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300"><?= $t['status'] ?></span>
                                  <?php endif; ?>
                              </td>
                              <td class="px-6 py-4">
                                  <?= $t['created_at'] ?>
                              </td>
                          </tr>
                      <?php endforeach; ?>
                  </tbody>
              </table>
              
              <div class="flex justify-center mt-5 items-center">
                  <div class="inline-flex" id="custom-paging">
                      <button class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-murky-800 rounded-s hover:bg-murky-800 hover:text-white" id="prev-button">
                          Prev
                      </button>
                      <button class="fflex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-murky-800 rounded-s hover:bg-murky-800 hover:text-white" id="next-button">
                          Next
                      </button>
                  </div>
              </div>
          </div>
      </div>
    </div>
</section>

<script>
  var selectedMetodeCode = "";
  var selectedMetodeName = "";
  
  var borderColor = getComputedStyle(document.documentElement).getPropertyValue('--border-color');
  
  <?php foreach ($metode as $m) : ?>
    <?php if ($m['kode'] != 123) : ?>
      document.getElementById('metodeBtn<?= $m['kode'] ?>').addEventListener('click', function () {
          handleMetodeSelection('<?= $m['kode'] ?>', '<?= $m['kode'] ?>');
      });
    <?php endif; ?>
  <?php endforeach; ?>
  
  function handleMetodeSelection(kodeMetode, namaMetode) {
    <?php foreach ($metode as $m) : ?>
      <?php if ($m['kode'] != 123) : ?>
        document.getElementById('metodeBtn<?= $m['kode'] ?>').style.border = '2px solid transparent';
        document.getElementById('selectedMetodeIndicator<?= $m['kode'] ?>').classList.add('hidden');
      <?php endif; ?>
    <?php endforeach; ?>
    document.getElementById('metodeBtn' + kodeMetode).style.border = '2px solid ' + borderColor;
    document.getElementById('selectedMetodeIndicator' + kodeMetode).classList.remove('hidden');

    selectedMetodeCode = kodeMetode;
    selectedMetodeName = namaMetode;
  }
  
  function placeTopup() {
    var nominal = document.getElementById("nominal").value;
    
    var errorMessages = [];
    
    const Toast = Swal.mixin({
        toast: true,
        position: "top",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: false,
        didOpen: (toast) => {
          toast.onmouseenter = Swal.stopTimer;
          toast.onmouseleave = Swal.resumeTimer;
        }
    });
    
    if (!nominal) {
        var notyf = new Notyf({
          duration: 4000,
          position: {
            x: 'right',
            y: 'top',
          },
        });
        notyf.error('Harap masukkan nominal top up saldo');
        document.getElementById('dataNominal').scrollIntoView({ behavior: 'smooth' });
        return;
    }
    if (nominal < 1000) {
        var notyf = new Notyf({
          duration: 4000,
          position: {
            x: 'right',
            y: 'top',
          },
        });
        notyf.error('Nominal top up saldo tidak boleh kurang dari 1000');
        document.getElementById('dataNominal').scrollIntoView({ behavior: 'smooth' });
        return;
    }
    if (!selectedMetodeCode) {
        var notyf = new Notyf({
          duration: 4000,
          position: {
            x: 'right',
            y: 'top',
          },
        });
        notyf.error('Harap pilih Metode Pembayaran');
        document.getElementById('dataMetode').scrollIntoView({ behavior: 'smooth' });
        return;
    }
    if (!selectedMetodeName) {
        var notyf = new Notyf({
          duration: 4000,
          position: {
            x: 'right',
            y: 'top',
          },
        });
        notyf.error('Terdapat kesalahan pada metode pembayaran');
        return;
    }
    
    Swal.fire({
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
    
    fetch('<?= base_url('dashboard/topup/prosesPayment') ?>', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        nominal: nominal,
        metodeName: selectedMetodeName,
        metodeCode: selectedMetodeCode,
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
    
    function handlePaymentResponse(responseData) {
      if (responseData.success && responseData.topupID) {
        const topupID = responseData.topupID;
        window.location.href = `<?= base_url('dashboard/topup/invoice/') ?>${topupID}`;
      } else {
        const errorMessage = responseData.message || "Terjadi kesalahan saat memproses pembayaran. Silakan coba lagi nanti.";
        var notyf = new Notyf({
          duration: 4000,
          position: {
            x: 'right',
            y: 'top',
          },
        });
        notyf.error(errorMessage);
      }
    }
    
    function handlePaymentError(error) {
      const errorMessage = error.message || "Terjadi kesalahan saat memproses pembayaran. Silakan coba lagi nanti.";
      var notyf = new Notyf({
          duration: 4000,
          position: {
            x: 'right',
            y: 'top',
          },
        });
        notyf.error(errorMessage);
    }
  
  }
  
  
  
  $(document).ready(function() {
    var table = $('#history').DataTable({
        lengthChange: false,
        dom: 'rtip',
        pagingType: 'simple',
        pageLength: 10,
    });
    
    $('.dataTables_paginate').hide();
    
    $('#table-search').on('keyup', function() {
        table.search(this.value).draw();
    });
    
    $('#table-search').on('change', function() {
        if (!this.value) {
            table.search('').draw();
        }
    });
    
    $('#prev-button').on('click', function() {
        table.page('previous').draw('page');
    });
    
    $('#next-button').on('click', function() {
        table.page('next').draw('page');
    });
    
    table.on('draw', function() {
        var info = table.page.info();
        var start = info.start + 1;
        var end = Math.min(info.start + info.length, info.recordsTotal);
        var totalEntries = info.recordsTotal;

        var pagingInfo = 'Showing ' + start + ' to ' + end + ' of ' + totalEntries + ' Entries';
        $('#paging-info').html(pagingInfo);
        
        $('#prev-button').prop('disabled', info.page === 0);
        
        $('#next-button').prop('disabled', info.page === info.pages - 1);
    });
});
</script>

<?= $this->endSection() ?>