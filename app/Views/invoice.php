

<?= $this->extend('template') ?>
<?= $this->section('content') ?>


<div class="flex flex-col gap-3 w-full max-w-screen-md mx-auto">
    <div class="flex flex-col gap-3 relative w-full">
      <div class="w-full p-4 bg-murky-900">
        <div class="mt-5">
          <p class="font-medium x-color-g">Terima Kasih!</p>
          <?php if ($invoice['status_pembayaran'] == 'Paid'): ?>
          <div>
            <p class="text-4xl text-gray-900 dark:text-white font-extrabold mt-3">Pembayaran anda terkonfirmasi.</p>
            <p class="font-normal text-gray-900 dark:text-gray-300 mt-3">Pesanan kamu <span class="x-color-g font-extrabold text-xl"><?= $invoice['order_id'] ?></span> berhasil di pesan, cek status pesanan anda pada invoice pembelian atau melalui menu cek transaksi.</p>
          </div>
          <?php else: ?>
          <div>
            <p class="text-4xl text-gray-900 dark:text-white font-extrabold mt-3">Harap selesaikan pembayaran.</p>
            <p class="font-normal text-gray-900 dark:text-gray-300 mt-3">Pesanan kamu <span class="x-color-g font-extrabold text-xl"><?= $invoice['order_id'] ?></span> menunggu pembayaran sebelum dikirim.</p>
            <div class="my-5">
              <p class="font-normal text-gray-900 dark:text-white mt-5">Pesanan ini akan kadaluwarsa pada</p>
              <div class="rounded-md x-bg-g px-4 py-2 my-2 text-center text-white" id="batasPembayaran">Waiting</div>
            </div>
          </div>
          <hr class="border-murky-600 mt-5 mb-5">
          <?php endif; ?>
          <div class="mt-5">
            <div class="flow-root">
              <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                <li class="py-3 sm:py-4">
                  <div class="flex items-center">
                      <?php if ($invoice['provider'] == 'RG'): ?>
                      <div class="flex-shrink-0">
                          <img class="object-cover lazy-image w-24 h-32 rounded" data-src="<?= base_url(); ?>public/img/banner/20240322MLBB-banner.jpg" alt="MLBB" loading="lazy">
                    </div>
                    <div class="flex-1 min-w-0 ms-4">
                      <p class="text-xl font-medium text-gray-900 truncate dark:text-white"><?= $invoice['games'] ?></p>
                      <p class="text-sm text-gray-500 truncate dark:text-gray-400"><?= $invoice['produk'] ?></p>
                      <p class="text-lg text-gray-500 truncate dark:text-gray-400"><?= $invoice['trx_id'] ?></p>
                    <table class="mt-3">
                       <?php else : ?>
                       <div class="flex-shrink-0">
                          <img class="object-cover lazy-image w-24 h-32 rounded" data-src="<?= base_url(); ?>public/img/games/<?= $games['gambar'] ?>" alt="<?= $games['nama'] ?>" loading="lazy">
                    </div>
                    <div class="flex-1 min-w-0 ms-4">
                      <p class="text-xl font-medium text-gray-900 truncate dark:text-white"><?= $invoice['games'] ?></p>
                      <p class="text-sm text-gray-500 truncate dark:text-gray-400"><?= $invoice['produk'] ?></p>
                    <table class="mt-3">
                       <?php if ($invoice['nama_target'] !== 'Off'): ?>
                        <tr>
                          <th class="font-normal text-gray-900 dark:text-white">Nickname</th>
                          <td class="text-gray-500 truncate dark:text-gray-400 px-2"><?= $invoice['nama_target'] ?></td>
                        </tr>
                      <?php endif; ?>
                      <tr>
                        <th class="font-normal text-gray-900 dark:text-white">ID</th>
                        <td class="text-gray-500 truncate dark:text-gray-400 px-2"><?= $invoice['uid'] ?></td>
                      </tr>
                      <?php if ($invoice['server'] !== 'NoServer'): ?>
                          <tr>
                              <th class="font-normal text-gray-900 dark:text-white">Server</th>
                              <td class="text-gray-500 truncate dark:text-gray-400 px-2"><?= $invoice['server'] ?></td>
                          </tr>
                      <?php endif; ?>
                      <?php endif; ?>
                    </table>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="mt-4">
            <div class="w-full bg-murky-800 text-white rounded-lg p-4 shadow">
              <table class="w-full">
                <tr>
                  <th class="text-left">Harga</th>
                  <td class="text-right py-1">Rp. <?= number_format($invoice['harga_jual'], 0, ',', '.') ?></td>
                </tr>
                <tr>
                  <th class="text-left">Fee</th>
                  <td class="text-right py-1">Rp. <?= number_format($invoice['fee'], 0, ',', '.') ?></td>
                </tr>
                <tr class="border-t border-murky-600">
                  <th class="text-left">Total Pembayaran</th>
                  <td class="font-bold x-color-g text-right py-3">Rp. <?= number_format($invoice['total_pembayaran'], 0, ',', '.') ?></td>
                </tr>
              </table>
            </div>
          </div><br>
          <div class="w-full bg-murky-800 text-white rounded-lg p-4 shadow">
        <!-- Transaksi Dibuat -->
        <div class="progress-step">
            <div class="step-icon completed">
                <span>✔</span>
            </div>
            <div class="step-text">
                <div class="text-green-500">
                    Transaksi Dibuat
                </div>
                <div class="subtext">Transaksi berhasil dibuat.</div>
            </div>
        </div>

        <!-- Pembayaran -->
        <div class="progress-step">
            <?php if ($invoice['status_pembelian'] == 'success' || $invoice['status_pembelian'] == 'Sukses'): ?>
                <div class="step-icon completed">
                    <span>✔</span>
                </div>
                <div class="step-text">
                    <div class="text-green-500">
                        Pembayaran
                    </div>
                    <div class="subtext">Pembayaran Berhasil.</div>
                </div>
            <?php elseif ($invoice['status_pembelian'] == 'Proses'): ?>
                <div class="step-icon completed">
                    <span>✔</span>
                </div>
                <div class="step-text">
                    <div class="text-green-500">
                        Pembayaran
                    </div>
                    <div class="subtext">Pembayaran Berhasil.</div>
                </div>
            <?php elseif ($invoice['status_pembelian'] == 'Pending'): ?>
                <div class="step-icon in-progress">
                    <span></span>
                </div>
                <div class="step-text">
                    <div class="text-yellow-500">
                        Pembayaran
                    </div>
                    <div class="subtext">Silakan Melakukan Pembayaran.</div>
                </div>
            <?php else: ?>
                <div class="step-icon expired">
                    <span>X</span>
                </div>
                <div class="step-text">
                    <div class="text-red-500">
                        Pembayaran
                    </div>
                    <div class="subtext">Pembayaran sudah kadaluwarsa.</div>
                </div>
            <?php endif; ?>
        </div>

        <!-- Transaksi Selesai -->
        <div class="progress-step">
            <?php if ($invoice['status_pembelian'] == 'success' || $invoice['status_pembelian'] == 'Sukses'): ?>
                <div class="step-icon completed">
                    <span>✔</span>
                </div>
                <div class="step-text">
                    <div class="text-green-500">
                        Selesai
                    </div>
                    <div class="subtext">Pesanan Berhasil Dikirim.</div>
                </div>
            <?php elseif ($invoice['status_pembelian'] == 'Proses'): ?>
                <div class="step-icon in-progress">
                    <span></span>
                </div>
                <div class="step-text">
                    <div class="text-yellow-500">
                        Proses
                    </div>
                    <div class="subtext">Pesanan Sedang di Proses.</div>
                </div>
            <?php elseif ($invoice['status_pembelian'] == 'Pending'): ?>
                <div class="step-icon pending">
                    <span></span>
                </div>
                <div class="step-text">
                    <div class="text-grey-500">
                        Pending
                    </div>
                    <div class="subtext">Pesanan Pending.</div>
                </div>
            <?php else: ?>
                <div class="step-icon expired">
                    <span>X</span>
                </div>
                <div class="step-text">
                    <div class="text-red-500">
                        Gagal
                    </div>
                    <div class="subtext">Pesanan Gagal di Proses.</div>
                </div>
            <?php endif; ?>
        </div>
    </div>
          <div class="mt-5">
            <p class="text-xl text-gray-900 dark:text-white font-extrabold mt-3">Metode Pembayaran</p>
            <p class="text-md text-gray-900 dark:text-white font-normal"><?= $invoice['metode_pembayaran'] ?></p>
          </div>
          <hr class="border-murky-600 mt-5 mb-5">
          <div class="w-full">
            <div class="border-b border-murky-600 pb-3">
              <table class="w-full text-gray-900 dark:text-white">
                <tr>
                  <th class="text-left font-normal">Nomor Invoice</th>
                  <td class="text-right py-2"><?= $invoice['order_id'] ?></td>
                </tr>
                <tr>
                  <th class="text-left font-normal">Status Transaksi</th>
                  <td class="text-right py-2">
                    <?php if ($invoice['status_pembelian'] == 'success' || $invoice['status_pembelian'] == 'Sukses'): ?>
                          <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300"><?= $invoice['status_pembelian'] ?></span>
                            <?php elseif ($invoice['status_pembelian'] == 'Proses'): ?>
                            <span class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300"><?= $invoice['status_pembelian'] ?></span>
                            <?php elseif ($invoice['status_pembelian'] == 'Pending'): ?>
                            <span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300"><?= $invoice['status_pembelian'] ?></span>
                            <?php else: ?>
                            <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300"><?= $invoice['status_pembelian'] ?></span>
                            <?php endif; ?>
                  </td>
                </tr>
                <tr>
                  <th class="text-left font-normal">Status Pembayaran</th>
                  <td class="text-right py-2">
                    <?php if ($invoice['status_pembayaran'] == 'Paid'): ?>
                          <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300"><?= $invoice['status_pembayaran'] ?></span>
                            <?php else: ?>
                            <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300"><?= $invoice['status_pembayaran'] ?></span>
                            <?php endif; ?>
                  </td>
                </tr>
                <tr>
                  <th class="text-left font-normal">Pesan</th>
                  <td class="text-right py-2"><?= $invoice['note'] ?></td>
                </tr>
              </table>
            </div>
            <?php if ($invoice['status_pembayaran'] == 'Unpaid'): ?>
            <div class="space-y-5">
              <div id="gambar-qris">
                <div class="mt-4">
                  <?php if ($invoice['metode_pembayaran'] == 'QRIS' || $invoice['metode_pembayaran'] == 'QRIS2' || $invoice['metode_pembayaran'] == 'QRIS3' || $invoice['metode_pembayaran'] == 'QRISMU'): ?>
                  <p class="text-xl text-center font-bold text-gray-900 dark:text-white">Pindai kode QR</p>
                  <div class="flex items-center justify-center mx-auto my-3 mt-4">
                      <img src="<?= $invoice['kode_pembayaran'] ?>" class="bg-white rounded-lg p-1" style="max-width: 210px;">
                  </div>
                  <?php elseif ($invoice['metode_pembayaran'] == 'DANA' || $invoice['metode_pembayaran'] == 'Dana' || $invoice['metode_pembayaran'] == 'OVO' || $invoice['metode_pembayaran'] == 'Ovo' || $invoice['metode_pembayaran'] == 'LINKAJA' || $invoice['metode_pembayaran'] == 'LinkAja' || $invoice['metode_pembayaran'] == 'GOPAY' || $invoice['metode_pembayaran'] == 'GoPay' || $invoice['metode_pembayaran'] == 'SHOPEEPAY' || $invoice['metode_pembayaran'] == 'ShopeePay' || $invoice['metode_pembayaran'] == 'ShopeePay' || $invoice['metode_pembayaran'] == 'Telkomsel' || $invoice['metode_pembayaran'] == 'Axis' || $invoice['metode_pembayaran'] == 'XL' || $invoice['metode_pembayaran'] == 'Tri'): ?>
                  <p class="text-xl text-center font-bold text-white">Bayar</p>
                  <span class="text-xs text-gray-500 dark:text-gray-300">Klik tombol bayar sekarang untuk melanjutkan pembayaran.</span>
                  <div class="flex items-center justify-center mx-auto my-3 mt-4 gap-3">
                      <a href="<?= $invoice['kode_pembayaran'] ?>" target="_blank" type="button" class="bg-blue-600 w-full text-white text-sm h-12 px-3 py-2 hover:opacity-80 rounded-md justify-center items-center gap-2 inline-flex">Bayar Sekarang</a>
                  </div>
                  <?php else: ?>
                  <p class="text-xl text-center font-bold text-gray-900 dark:text-white">Kode Pembayaran</p>
                  <div class="flex items-center justify-center mx-auto my-3 mt-4 gap-3">
                      <p class="text-2xl text-center font-bold text-gray-900 dark:text-white">
                      <input type="text" value="<?= $invoice['kode_pembayaran'] ?>" id="myInput" style="background: transparent;border-color: transparent;" readonly></p>
                      <!--<p id="kodePembayaran" class="text-2xl text-center font-bold text-gray-900 dark:text-white"><?= $invoice['kode_pembayaran'] ?></p>-->
                      <button onclick="myFunction()"><i class="fa-regular fa-copy text-2xl text-center font-bold text-gray-900 dark:text-white" style="margin: -35px;margin-top: -13px;position: absolute;"></i></button>
                  </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <?php endif; ?>
            <div class="mt-8">
              <div class="w-full bg-murky-800 text-white rounded-lg p-4 shadow">
                <p class="text-xl font-bold text-white">Panduan Pembayaran</p>
                <div class="pt-4">
                  <?= $invoice['cara_bayar'] ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

<script>
function myFunction() {
  // Get the text field
  var copyText = document.getElementById("myInput");

  // Select the text field
  copyText.select();
  copyText.setSelectionRange(0, 99999); // For mobile devices

  // Copy the text inside the text field
  navigator.clipboard.writeText(copyText.value);
  
  Swal.fire({
        customClass: "my-custom-alert",
        title: "Success",
        text: "Berhasil Menyalin Kode Pembayaran",
        icon: "success",

    });
}
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
  var thirtyMinutes = 30 * 60; // 30 minutes in seconds

  // Function to get or set endTime
  function updateEndTime() {
    var currentTime = Math.floor(Date.now() / 1000);
    var endTime = sessionStorage.getItem('endTime');
    
    if (!endTime) {
      // Set a new endTime if not already set
      endTime = currentTime + thirtyMinutes;
      sessionStorage.setItem('endTime', endTime);
    }

    return endTime;
  }

  var endTime = updateEndTime();

  var x = setInterval(function() {
    var now = Math.floor(Date.now() / 1000);
    var timeRemaining = endTime - now;

    if (timeRemaining <= 0) {
      clearInterval(x);
      document.getElementById("batasPembayaran").innerHTML = "Melewati batas waktu pembayaran!";

      var gambarQris = document.getElementById('gambar-qris');
      if (gambarQris) {
        gambarQris.style.display = 'none';
      }

      // Optionally, you might want to clear the endTime
      sessionStorage.removeItem('endTime');
      return;
    }

    var hours = Math.floor(timeRemaining / 3600);
    var minutes = Math.floor((timeRemaining % 3600) / 60);
    var seconds = timeRemaining % 60;

    var CountDown = `${minutes} Menit, ${seconds} Detik`;
    document.getElementById("batasPembayaran").innerHTML = CountDown;
  }, 1000);

  function salinKodePembayaran() {
    var kodePembayaran = document.getElementById('kodePembayaran');
    var textarea = document.createElement('textarea');
    textarea.value = kodePembayaran.textContent;
    textarea.style.position = 'fixed';
    textarea.style.opacity = 0;

    document.body.appendChild(textarea);
    textarea.select();
    document.execCommand('copy');
    document.body.removeChild(textarea);

    Swal.fire({
      toast: true,
      position: "top",
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: false,
      didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
      }
    }).fire({
      icon: 'success',
      title: 'Kode pembayaran telah disalin!'
    });
  }
});
</script>

<?= $this->endSection() ?>
