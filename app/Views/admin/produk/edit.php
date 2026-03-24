<?php $this->extend('admin/template'); ?>
<?= $this->section('content') ?>

<section class="bg-murky-900 mb-8">
  <div class="px-4 mx-auto w-full">
      <h2 class="mb-4 text-xl font-bold text-white">Edit Produk #<?= $produk['id'] ?></h2>
      <form action="<?= base_url('admin/produk/update/' . $produk['id']) ?>" method="post" enctype="multipart/form-data">
          <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
              <div class="sm:col-span-2">
                  <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                  <input type="text" name="nama" class="custom-input block w-full" value="<?= $produk['nama'] ?>" required="">
              </div>
              <div class="w-full">
                  <label for="harga_provider" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga Provider</label>
                  <input type="number" name="harga_provider" class="custom-input block w-full" value="<?= $produk['harga_provider'] ?>" required>
              </div>
              <div class="w-full">
                  <label for="harga_jual" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                  <input type="number" name="harga_jual" class="custom-input block w-full" value="<?= $produk['harga_jual'] ?>" required>
              </div>
              <div class="w-full">
                  <label for="harga_basic" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga Basic</label>
                  <input type="number" name="harga_basic" class="custom-input block w-full" value="<?= $produk['harga_basic'] ?>" required>
              </div>
              <div class="w-full">
                  <label for="harga_gold" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga Gold</label>
                  <input type="number" name="harga_gold" class="custom-input block w-full" value="<?= $produk['harga_gold'] ?>" required>
              </div>
              <div class="w-full">
                  <label for="harga_platinum" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga Platinum</label>
                  <input type="number" name="harga_platinum" class="custom-input block w-full" value="<?= $produk['harga_platinum'] ?>" required>
              </div>
              <div class="w-full">
                  <label for="keuntungan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profit</label>
                  <input type="number" name="keuntungan" class="custom-input block w-full" value="<?= $produk['keuntungan'] ?>" required>
              </div>
              <div class="w-full">
                  <label for="keuntungan_basic" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profit Basic</label>
                  <input type="number" name="keuntungan_basic" class="custom-input block w-full" value="<?= $produk['keuntungan_basic'] ?>" required>
              </div>
              <div class="w-full">
                  <label for="keuntungan_gold" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profit Gold</label>
                  <input type="number" name="keuntungan_gold" class="custom-input block w-full" value="<?= $produk['keuntungan_gold'] ?>" required>
              </div>
              <div class="w-full">
                  <label for="keuntungan_platinum" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profit Platinum</label>
                  <input type="number" name="keuntungan_platinum" class="custom-input block w-full" value="<?= $produk['keuntungan_platinum'] ?>" required>
              </div>
              <div class="w-full">
                  <label for="kode_produk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Produk</label>
                  <input type="text" name="kode_produk" class="custom-input block w-full" value="<?= $produk['kode_produk'] ?>" required>
              </div>
              <div>
                  <label for="provider" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provider</label>
                  <select class="custom-input block w-full" name="provider" required>
                              <option value="Vip" <?= ($produk['provider'] == 'Vip') ? 'selected' : '' ?>>Vip Reseller</option>
                              <option value="DF" <?= ($produk['provider'] == 'DF') ? 'selected' : '' ?>>DigiFlazz</option>
                              <option value="AG" <?= ($produk['provider'] == 'AG') ? 'selected' : '' ?>>Api Games</option>
                              <option value="Manual" <?= ($produk['provider'] == 'Manual') ? 'selected' : '' ?>>Manual</option>
                  </select>
              </div>
              <div>
                  <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand</label>
                   <?php $last_select = $produk['brand']; ?>
                  <select class="custom-input block w-full" name="brand" required>
                              <?php foreach ($games as $g) : ?>
                                  <option value="<?= $g['brand'] ?>" <?= ($g['brand'] == $last_select) ? 'selected' : '' ?> ><?= $g['nama'] ?></option>
                              <?php endforeach; ?>
                  </select>
              </div>
              <div>
                  <label for="tipe" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipe</label>
                  <select class="custom-input block w-full" name="tipe" required>
                              <option value="instant" <?= ($produk['tipe'] == 'instant') ? 'selected' : '' ?>>Top Up Instant</option>
                              <option value="special" <?= ($produk['tipe'] == 'special') ? 'selected' : '' ?>>Special Items</option>
                  </select>
              </div>
              <div>
                  <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                  <select class="custom-input block w-full" name="status" required>
                              <option value="aktif">Aktif</option>
                              <option value="tidak aktif">tidak aktif</option>
                  </select>
              </div>
              <div class="w-full">
                  <label for="logo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Logo</label>
                  <input type="file" name="logo" class="custom-input block w-full">
              </div>
              <!-- Flash Sale -->
              <div class="flex items-start mb-3 mt-5">
                <div class="flex items-center h-5">
                  <input id="flashsale" type="checkbox" name="sts_flash_sale" <?= ($produk['sts_flash_sale'] == 'Ya') ? 'checked' : '' ?> class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800"/>
                </div>
                <label for="sts_flash_sale" class="block ms-3 text-sm font-medium text-gray-900 dark:text-white">Flash Sale ?</label>
              </div>
              <div class="mb-3 flash-sale-input">
                <label for="persen_diskon" class="block mb-2 text-sm font-medium text-white">Persen Diskon</label>
                <input type="number" name="persen_diskon" class="custom-input block w-full" value="<?= $produk['persen_diskon'] ?>">
              </div>
              <div class="mb-3 flash-sale-input">
                <label for="harga_fs" class="block mb-2 text-sm font-medium text-white">Harga Flash Sale</label>
                <input type="number" name="harga_fs" class="custom-input block w-full" value="<?= $produk['harga_fs'] ?>" readonly>
              </div>
              <div class="mb-3 flash-sale-input">
                <label for="harga_fs_basic" class="block mb-2 text-sm font-medium text-white">Harga Flash Sale Basic</label>
                <input type="number" name="harga_fs_basic" class="custom-input block w-full" value="<?= $produk['harga_fs_basic'] ?>" readonly>
              </div>
              <div class="mb-3 flash-sale-input">
                <label for="harga_fs_gold" class="block mb-2 text-sm font-medium text-white">Harga Flash Sale Gold</label>
                <input type="number" name="harga_fs_gold" class="custom-input block w-full" value="<?= $produk['harga_fs_gold'] ?>" readonly>
              </div>
              <div class="mb-3 flash-sale-input">
                <label for="harga_fs_platinum" class="block mb-2 text-sm font-medium text-white">Harga Flash Sale Platinum</label>
                <input type="number" name="harga_fs_platinum" class="custom-input block w-full" value="<?= $produk['harga_fs_platinum'] ?>" readonly>
              </div>
              <div class="mb-3 flash-sale-input">
                <label for="waktu_akhir_fs" class="block mb-2 text-sm font-medium text-white">Waktu Akhir Flash Sale</label>
                <input type="datetime-local" name="waktu_akhir_fs" class="custom-input block w-full" value="<?= $produk['waktu_akhir_fs'] ?>" placeholder="<?= $produk['waktu_akhir_fs'] ?>">
              </div>
              <!-- End Flash Sale -->
          </div>
          <div class="flex mt-5 items-center">
            <div class="inline-flex">
              <button type="submit" class="text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center me-2">Simpan</button>
              <a href="<?= base_url('admin/produk') ?>" type="button" class="text-white bg-red-600 hover:bg-red-700 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Batal</a>
            </div>
          </div>
      </form>
  </div>
</section>

<script>
// Flash Sale
document.addEventListener('DOMContentLoaded', function() {
    const checkbox = document.getElementById('flashsale');
    const hiddenInput = document.querySelector('input[name="sts_flash_sale"]');
    const flashSaleInputs = document.querySelectorAll('.flash-sale-input');

    // Set nilai awal berdasarkan nilai yang ada di hiddenInput
    checkbox.checked = hiddenInput.value === 'Ya';

    // Atur nilai hiddenInput sesuai dengan status checkbox saat halaman dimuat
    hiddenInput.value = checkbox.checked ? 'Ya' : 'No';

    checkbox.addEventListener('change', function() {
        // Atur nilai hiddenInput sesuai dengan status checkbox saat diubah
        hiddenInput.value = this.checked ? 'Ya' : 'No';

        // Tampilkan atau sembunyikan input flash sale berdasarkan status checkbox
        flashSaleInputs.forEach(input => {
            if (this.checked) {
                input.style.display = 'block';
                input.removeAttribute('disabled');
            } else {
                input.style.display = 'none';
                input.setAttribute('disabled', true);
            }
        });
    });
});

// Hasil Harga Flash Sale
document.addEventListener('DOMContentLoaded', function() {
    const hargaJualInput = document.querySelector('input[name="harga_jual"]');
    const hargaBasicInput = document.querySelector('input[name="harga_basic"]');
    const hargaGoldInput = document.querySelector('input[name="harga_gold"]');
    const hargaPlatinumInput = document.querySelector('input[name="harga_platinum"]');
    const persenDiskonInput = document.querySelector('input[name="persen_diskon"]');
    
    const hargaFsInput = document.querySelector('input[name="harga_fs"]');
    const hargaFsBasicInput = document.querySelector('input[name="harga_fs_basic"]');
    const hargaFsGoldInput = document.querySelector('input[name="harga_fs_gold"]');
    const hargaFsPlatinumInput = document.querySelector('input[name="harga_fs_platinum"]');
    
    function updateHargaFs() {
        const hargaJual = parseFloat(hargaJualInput.value);
        const persenDiskon = parseFloat(persenDiskonInput.value);
        
        if (!isNaN(hargaJual) && !isNaN(persenDiskon)) {
            const diskon = (persenDiskon / 100) * hargaJual;
            const hargaSetelahDiskon = hargaJual - diskon;
            
            hargaFsInput.value = parseInt(hargaSetelahDiskon);
        }
    }
    
    function updateHargaFsByType(input, hargaFsInput) {
        const harga = parseFloat(input.value);
        const persenDiskon = parseFloat(persenDiskonInput.value);
        
        if (!isNaN(harga) && !isNaN(persenDiskon)) {
            const diskon = (persenDiskon / 100);
            const hargaFs = harga * (1 - diskon);
            hargaFsInput.value = parseInt(hargaFs);
        }
    }
    
    hargaJualInput.addEventListener('input', updateHargaFs);
    hargaBasicInput.addEventListener('input', function() {
        updateHargaFsByType(this, hargaFsBasicInput);
    });
    hargaGoldInput.addEventListener('input', function() {
        updateHargaFsByType(this, hargaFsGoldInput);
    });
    hargaPlatinumInput.addEventListener('input', function() {
        updateHargaFsByType(this, hargaFsPlatinumInput);
    });
    persenDiskonInput.addEventListener('input', function() {
        updateHargaFs();
        updateHargaFsByType(hargaBasicInput, hargaFsBasicInput);
        updateHargaFsByType(hargaGoldInput, hargaFsGoldInput);
        updateHargaFsByType(hargaPlatinumInput, hargaFsPlatinumInput);
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const hargaJualInput = document.getElementById('format_rupiah');

    hargaJualInput.addEventListener('input', function() {
        // Hapus semua karakter selain angka dan titik
        const formattedValue = this.value.replace(/[^0-9.]/g, '');

        // Konversi nilai menjadi format ribuan
        const formattedNumber = parseFloat(formattedValue).toLocaleString('id-ID');

        // Set nilai input dengan format ribuan
        this.value = formattedNumber;
    });
});
</script>

<?= $this->endSection(); ?>