<?php $this->extend('admin/template'); ?>
<?= $this->section('content') ?>

<section class="bg-murky-900 mb-8">
  <div class="px-4 mx-auto w-full">
      <h2 class="mb-4 text-xl font-bold text-white">Edit Metode #<?= $metode['nama'] ?></h2>
      <form action="<?= base_url('admin/metode-pembayaran/update/' . $metode['id']) ?>" method="post" enctype="multipart/form-data">
          <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
              <div class="sm:col-span-2">
                  <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Metode</label>
                  <input type="text" name="nama" class="custom-input block w-full" value="<?= $metode['nama'] ?>" required="">
              </div>
              <div class="sm:col-span-2">
                  <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                  <input type="text" name="keterangan" class="custom-input block w-full" value="<?= $metode['keterangan'] ?>" required="">
              </div>
              <div class="sm:col-span-2">
                  <label for="kode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode</label>
                  <input type="text" name="kode" class="custom-input block w-full" value="<?= $metode['kode'] ?>" required="">
              </div>
              <div class="sm:col-span-2">
                <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                <?php $last_select = $metode['kategori']; ?>
                  <select class="custom-input block w-full" name="kategori" required>
                  <option value="virtual-account" <?= ($metode['kategori'] == 'virtual-account') ? 'selected' : '' ?>>Virtual Account</option>
                  <option value="ewallet" <?= ($metode['kategori'] == 'ewallet') ? 'selected' : '' ?>>Ewallet</option>
                  <option value="retail" <?= ($metode['kategori'] == 'retail') ? 'selected' : '' ?>>Retail</option>
                  <option value="pulsa" <?= ($metode['kategori'] == 'pulsa') ? 'selected' : '' ?>>Pulsa</option>
                  <option value="saldo" <?= ($metode['kategori'] == 'saldo') ? 'selected' : '' ?>>Saldo</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="gambar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar</label>
                <input type="file" name="gambar" class="custom-input block w-full" value="<?= $metode['gambar'] ?>">
              </div>
          </div>
          <div class="flex mt-5 items-center">
            <div class="inline-flex">
              <button type="submit" class="text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center me-2">Simpan</button>
              <a href="<?= base_url('admin/metode-pembayaran') ?>" type="button" class="text-white bg-red-600 hover:bg-red-700 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Batal</a>
            </div>
          </div>
      </form>
  </div>
</section>

<?= $this->endSection(); ?>