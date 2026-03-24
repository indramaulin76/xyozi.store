<?php $this->extend('admin/template'); ?>
<?php $this->section('content'); ?>
  
<section class="bg-murky-900 mb-8">
  <h2 class="mb-5 text-xl font-semibold leading-none text-white md:text-2xl">Transaksi Hari Ini</h2>
  <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-4">
    <div class="p-3 text-sm text-gray-800 rounded-lg bg-green-200" role="alert">
      <span class="font-normal">Sukses</span>
      <div class="space-y-2">
        <p class="text-2xl font-semibold text-gray-900"><?php echo number_format($totalPembelianSuksesToday, 0, ',', '.'); ?><span class="text-sm">x</span></p>
        <p class="font-semibold text-gray-900">Rp <?php echo number_format($rupiahPembelianSuksesToday, 0, ',', '.'); ?></p>
      </div>
    </div>
    <div class="p-3 text-sm text-gray-800 rounded-lg bg-blue-200" role="alert">
      <span class="font-normal">Proses</span>
      <div class="space-y-2">
        <p class="text-2xl font-semibold text-gray-900"><?php echo number_format($totalPembelianProsesToday, 0, ',', '.'); ?><span class="text-sm">x</span></p>
        <p class="font-semibold text-gray-900">Rp <?php echo number_format($rupiahPembelianProsesToday, 0, ',', '.'); ?></p>
      </div>
    </div>
    <div class="p-3 text-sm text-gray-800 rounded-lg bg-yellow-100" role="alert">
      <span class="font-normal">Pending</span>
      <div class="space-y-2">
        <p class="text-2xl font-semibold text-gray-900"><?php echo number_format($totalPembelianPendingToday, 0, ',', '.'); ?><span class="text-sm">x</span></p>
        <p class="font-semibold text-gray-900">Rp <?php echo number_format($rupiahPembelianPendingToday, 0, ',', '.'); ?></p>
      </div>
    </div>
    <div class="p-3 text-sm text-gray-800 rounded-lg bg-red-200" role="alert">
      <span class="font-normal">Gagal</span>
      <div class="space-y-2">
        <p class="text-2xl font-semibold text-gray-900"><?php echo number_format($totalPembelianGagalToday, 0, ',', '.'); ?><span class="text-sm">x</span></p>
        <p class="font-semibold text-gray-900">Rp <?php echo number_format($rupiahPembelianGagalToday, 0, ',', '.'); ?></p>
      </div>
    </div>
  </div>
</section>

<section class="bg-murky-900 mb-8">
  <h2 class="mb-5 text-xl font-semibold leading-none text-white md:text-2xl">Transaksi Keseluruhan</h2>
  <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-4">
    <div class="p-3 text-sm text-gray-800 rounded-lg bg-green-200" role="alert">
      <span class="font-normal">Sukses</span>
      <div class="space-y-2">
        <p class="text-2xl font-semibold text-gray-900"><?php echo number_format($totalPembelianSukses, 0, ',', '.'); ?><span class="text-sm">x</span></p>
        <p class="font-semibold text-gray-900">Rp <?php echo number_format($rupiahPembelianSukses, 0, ',', '.'); ?></p>
      </div>
    </div>
    <div class="p-3 text-sm text-gray-800 rounded-lg bg-blue-200" role="alert">
      <span class="font-normal">Proses</span>
      <div class="space-y-2">
        <p class="text-2xl font-semibold text-gray-900"><?php echo number_format($totalPembelianProses, 0, ',', '.'); ?><span class="text-sm">x</span></p>
        <p class="font-semibold text-gray-900">Rp <?php echo number_format($rupiahPembelianProses, 0, ',', '.'); ?></p>
      </div>
    </div>
    <div class="p-3 text-sm text-gray-800 rounded-lg bg-yellow-100" role="alert">
      <span class="font-normal">Pending</span>
      <div class="space-y-2">
        <p class="text-2xl font-semibold text-gray-900"><?php echo number_format($totalPembelianPending, 0, ',', '.'); ?><span class="text-sm">x</span></p>
        <p class="font-semibold text-gray-900">Rp <?php echo number_format($rupiahPembelianPending, 0, ',', '.'); ?></p>
      </div>
    </div>
    <div class="p-3 text-sm text-gray-800 rounded-lg bg-red-200" role="alert">
      <span class="font-normal">Gagal</span>
      <div class="space-y-2">
        <p class="text-2xl font-semibold text-gray-900"><?php echo number_format($totalPembelianGagal, 0, ',', '.'); ?><span class="text-sm">x</span></p>
        <p class="font-semibold text-gray-900">Rp <?php echo number_format($rupiahPembelianGagal, 0, ',', '.'); ?></p>
      </div>
    </div>
  </div>
</section>

<section class="bg-murky-900 mb-8">
  <h2 class="mb-5 text-xl font-semibold leading-none text-white md:text-2xl">Keuntungan</h2>
  <div class="grid grid-cols-2 gap-4 mb-4">
    <div class="p-3 text-sm text-white rounded-lg bg-murky-800" role="alert">
      <span class="font-normal">Hari ini</span>
      <div class="py-2">
        <p class="text-2xl font-semibold text-white">Rp <?php echo number_format($totalKeuntunganToday, 0, ',', '.'); ?></p>
      </div>
    </div>
    <div class="p-3 text-sm text-white rounded-lg bg-murky-800" role="alert">
      <span class="font-normal">Keseluruhan</span>
      <div class="py-2">
        <p class="text-2xl font-semibold text-white">Rp <?php echo number_format($totalKeuntungan, 0, ',', '.'); ?></p>
      </div>
    </div>
  </div>
</section>

<section class="bg-murky-900 mb-8">
  <h2 class="mb-5 text-xl font-semibold leading-none text-white md:text-2xl">Data Lainnya</h2>
  <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-4">
    <div class="p-3 text-sm text-white rounded-lg bg-murky-800" role="alert">
      <span class="font-normal">Total Deposit</span>
      <div class="space-y-2">
        <p class="text-2xl font-semibold text-white"><?php echo number_format($totalTupupSukses, 0, ',', '.'); ?><span class="text-sm">x</span></p>
        <p class="font-semibold text-white">Rp <?php echo number_format($totalAmountTupupSukses, 0, ',', '.'); ?></p>
      </div>
    </div>
    <div class="p-3 text-sm text-white rounded-lg bg-murky-800" role="alert">
      <span class="font-normal">Saldo Member</span>
      <div class="py-2">
        <p class="text-xl font-semibold text-white">Rp <?php echo number_format($totalSaldoUser, 0, ',', '.'); ?></p>
      </div>
    </div>
    <div class="p-3 text-sm text-white rounded-lg bg-murky-800" role="alert">
      <span class="font-normal">Total Member</span>
      <div class="py-2">
        <p class="text-xl font-semibold text-white"><?php echo number_format($totalUser, 0, ',', '.'); ?></p>
      </div>
    </div>
    <div class="p-3 text-sm text-white rounded-lg bg-murky-800" role="alert">
      <span class="font-normal">Games</span>
      <div class="py-2">
        <p class="text-xl font-semibold text-white"><?php echo number_format($totalGames, 0, ',', '.'); ?></p>
      </div>
    </div>
    <div class="p-3 text-sm text-white rounded-lg bg-murky-800" role="alert">
      <span class="font-normal">Produk</span>
      <div class="py-2">
        <p class="text-xl font-semibold text-white"><?php echo number_format($totalProduk, 0, ',', '.'); ?></p>
      </div>
    </div>
  </div>
</section>
      
<?php $this->endSection(); ?>