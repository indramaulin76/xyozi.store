<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<div class="flex flex-col gap-3 w-full max-w-screen-md">
    <div class="flex flex-col gap-3 relative w-full">
      <div class="w-full p-4 bg-murky-900">
        <div class="mt-5">
          <p class="font-medium x-color-g">Terima Kasih!</p>
          <?php if ($invoice['status'] == 'Paid' || $invoice['status'] == 'PAID'): ?>
          <div>
            <p class="text-4xl text-gray-900 dark:text-white font-extrabold mt-3">Pembayara  anda terkonfirmasi.</p>
            <p class="font-normal text-gray-900 dark:text-gray-300 mt-3">Pesanan kamu <span class="x-color-g font-extrabold text-xl"><?= $invoice['topup_id'] ?></span> berhasil dan saldo anda sudah di tambahkan.</p>
          </div>
          <?php else: ?>
          <div>
            <p class="text-4xl text-gray-900 dark:text-white font-extrabold mt-3">Harap selesaikan pembayaran.</p>
            <p class="font-normal text-gray-900 dark:text-gray-300 mt-3">Pesanan kamu <span class="x-color-g font-extrabold text-xl"><?= $invoice['topup_id'] ?></span> menunggu pembayaran sebelum dikirim.</p>
            <div class="my-5">
              <p class="font-normal text-gray-900 dark:text-white mt-5">Pesanan ini akan kadaluwarsa pada</p>
              <div class="rounded-md x-bg-g px-4 py-2 my-2 text-center text-white" id="batasPembayaran">Waiting</div>
            </div>
          </div>
          <hr class="border-murky-600 mt-5 mb-5">
          <?php endif; ?>

          <div class="mt-4">
            <div class="w-full bg-murky-800 text-white rounded-lg p-4 shadow">
              <table class="w-full">
                <tr>
                  <th class="text-left">Nominal Top Up</th>
                  <td class="text-right py-1">Rp. <?= number_format($invoice['nominal'], 0, ',', '.') ?></td>
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
          </div>
          <div class="mt-5">
            <p class="text-xl text-white font-extrabold mt-3">Metode Pembayaran</p>
            <p class="text-md text-white font-normal"><?= $invoice['metode'] ?></p>
          </div>
          <hr class="border-murky-600 mt-5 mb-5">
          <div class="w-full">
            <div class="border-b border-gray-100 dark:border-gray-700 pb-3">
              <table class="w-full text-white">
                <tr>
                  <th class="text-left font-normal">Nomor Invoice</th>
                  <td class="text-right py-2"><?= $invoice['topup_id'] ?></td>
                </tr>
                <tr>
                  <th class="text-left font-normal">Status Transaksi</th>
                  <td class="text-right py-2">
                    <?php if ($invoice['status'] == 'Paid' || $invoice['status'] == 'PAID'): ?>
                          <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300"><?= $invoice['status'] ?></span>
                            <?php else: ?>
                            <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300"><?= $invoice['status'] ?></span>
                            <?php endif; ?>
                  </td>
                </tr>
              </table>
            </div>
            <?php if ($invoice['status'] == 'Unpaid'): ?>
            <div class="space-y-5">
              <div id="gambar-qris">
                <div class="mt-4">
                  <?php if ($invoice['metode'] == 'QRIS' || $invoice['metode'] == 'QRIS2' || $invoice['metode'] == 'QRIS3' || $invoice['metode'] == 'QRISMU'): ?>
                  <p class="text-xl text-center font-bold text-gray-900 dark:text-white">Pindai kode QR</p>
                  <div class="flex items-center justify-center mx-auto my-3 mt-4">
                      <img src="<?= $invoice['kode_pembayaran'] ?>" class="bg-white rounded-lg p-1" style="max-width: 210px;">
                  </div>
                  <?php elseif ($invoice['metode'] == 'DANA' || $invoice['metode'] == 'OVO' || $invoice['metode'] == 'LINKAJA' || $invoice['metode'] == 'GOPAY' || $invoice['metode'] == 'SHOPEEPAY' || $invoice['metode'] == 'ShopeePay' || $invoice['metode'] == 'Telkomsel' || $invoice['metode'] == 'Axis' || $invoice['metode'] == 'XL' || $invoice['metode'] == 'Tri'): ?>
                  <p class="text-xl text-center font-bold text-gray-900 dark:text-white">Bayar</p>
                  <span class="text-xs text-gray-500 dark:text-gray-300">Klik tombol bayar sekarang untuk melanjutkan pembayaran.</span>
                  <div class="flex items-center justify-center mx-auto my-3 mt-4 gap-3">
                      <a href="<?= $invoice['kode_pembayaran'] ?>" target="_blank" type="button" class="bg-blue-600 w-full text-white text-sm h-12 px-3 py-2 hover:opacity-80 rounded-md justify-center items-center gap-2 inline-flex">Bayar Sekarang</a>
                  </div>
                  <?php else: ?>
                  <p class="text-xl text-center font-bold text-gray-900 dark:text-white">Kode Pembayaran</p>
                  <div class="flex items-center justify-center mx-auto my-3 mt-4 gap-3">
                      <p id="kodePembayaran" class="text-2xl text-center font-bold text-gray-900 dark:text-white"><?= $invoice['kode_pembayaran'] ?></p>
                      <button onclick="salinKodePembayaran()"><i class="fa-regular fa-copy text-2xl text-center font-bold text-gray-900 dark:text-white"></i></button>
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
var batasPembayaran = new Date("<?= $invoice['batas_pembayaran'] ?>").getTime();
var x = setInterval(function() {
  var sekarang = new Date().getTime();
  var selisih = batasPembayaran - sekarang;
  var jam = Math.floor(selisih / (1000 * 60 * 60));
  var menit = Math.floor((selisih % (1000 * 60 * 60)) / (1000 * 60));
  var detik = Math.floor((selisih % (1000 * 60)) / 1000);
  document.getElementById("batasPembayaran").innerHTML = jam + " hours, " + menit + " minutes, " + detik + " seconds left ";

  var gambarQris = document.getElementById('gambar-qris');

  if (selisih < 0) {
    clearInterval(x);
    document.getElementById("batasPembayaran").innerHTML = "Melewati batas waktu pembayaran!";

    if (gambarQris) {
      gambarQris.style.display = 'none';
    }
  }
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
}
</script>

<?= $this->endSection() ?>