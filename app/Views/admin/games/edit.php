<?php $this->extend('admin/template'); ?>
<?= $this->section('content') ?>

<section class="bg-murky-900 mb-8">
  <div class="px-4 mx-auto w-full">
      <h2 class="mb-4 text-xl font-bold text-white">Edit Games #<?= $games['nama'] ?></h2>
      <form action="<?= base_url('admin/games/update/' . $games['id']) ?>" method="post" enctype="multipart/form-data">
          <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
              <div class="sm:col-span-2">
                  <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Games</label>
                  <input type="text" name="nama" class="custom-input block w-full" value="<?= $games['nama'] ?>" required="">
              </div>
              <div class="sm:col-span-2">
                  <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sub Nama Games</label>
                  <input type="text" name="sub_nama" class="custom-input block w-full" value="<?= $games['sub_nama'] ?>" required="">
              </div>
              <div class="sm:col-span-2">
                  <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand</label>
                  <input type="text" name="brand" class="custom-input block w-full" value="<?= $games['brand'] ?>" required="">
              </div>
              <div class="sm:col-span-2">
                  <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug / Url</label>
                  <input type="text" name="slug" class="custom-input block w-full" value="<?= $games['slug'] ?>" required="">
              </div>
              <div class="sm:col-span-2">
                <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                <?php $last_select = $games['kategori']; ?>
                  <select class="custom-input block w-full" name="kategori" required>
                      <?php foreach ($kategori as $k): ?>
                          <option value="<?= $k['nama'] ?>" <?= ($k['nama'] == $last_select) ? 'selected' : '' ?>>
                              <?= $k['nama'] ?>
                          </option>
                      <?php endforeach; ?>
                </select>
              </div>
              <div class="sm:col-span-2">
                <label for="tipe" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipe Populer?</label>
                <?php $last_select = $games['tipe']; ?>
                  <select class="custom-input block w-full" name="tipe" required>
                  <option value="Tidak" <?= ($games['tipe'] == 'Tidak') ? 'selected' : '' ?>>Tidak</option>
                      <option value="Populer" <?= ($games['tipe'] == 'Populer') ? 'selected' : '' ?>>Ya</option>
                </select>
              </div>
              <div class="sm:col-span-2">
                <label for="informasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Informasi</label>
                <textarea type="text" name="informasi" class="custom-input block w-full" required><?= $games['informasi'] ?></textarea>
              </div>
              <div class="sm:col-span-2">
                <label for="panduan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Panduan</label>
                <textarea type="text" name="panduan" class="custom-input block w-full" required><?= $games['panduan'] ?></textarea>
              </div>
              <div class="sm:col-span-2">
                <label for="tipe_target" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipe Target</label>
                  <select class="custom-input block w-full" name="tipe_target" required>
                  <option value="Id" <?= ($games['tipe_target'] == 'Id') ? 'selected' : '' ?>>ID (number)</option>
                  <option value="Id_text" <?= ($games['tipe_target'] == 'Id_text') ? 'selected' : '' ?>>ID (text)</option>
                    <option value="Id-Server" <?= ($games['tipe_target'] == 'Id-Server') ? 'selected' : '' ?>>ID (text) & Server</option>
                    <option value="Id_number-server" <?= ($games['tipe_target'] == 'Id_number-server') ? 'selected' : '' ?>>ID (number) & Server</option>
                    <option value="Nomor" <?= ($games['tipe_target'] == 'Nomor') ? 'selected' : '' ?>>Nomor Hp</option>
                    <option value="Email"  <?= ($games['tipe_target'] == 'Email') ? 'selected' : '' ?>>Email</option>
                    <option value="PLN"  <?= ($games['tipe_target'] == 'PLN') ? 'selected' : '' ?>>PLN</option>
                    <option value="genshin-impact" <?= ($games['tipe_target'] == 'genshin-impact') ? 'selected' : '' ?>>Genshin Impact</option>
                    <option value="ragnarok-origin" <?= ($games['tipe_target'] == 'ragnarok-origin') ? 'selected' : '' ?>>Ragnarok Origin</option>
                    <option value="ragnarok-m" <?= ($games['tipe_target'] == 'ragnarok-m') ? 'selected' : '' ?>>Ragnarok M</option>
                    <option value="tower-of-fantasy" <?= ($games['tipe_target'] == 'tower-of-fantasy') ? 'selected' : '' ?>>Tower Of Fantasy</option>
                    <option value="ace-racer" <?= ($games['tipe_target'] == 'ace-racer') ? 'selected' : '' ?>>Ace Racer</option>
                    <option value="seal-m-sea" <?= ($games['tipe_target'] == 'seal-m-sea') ? 'selected' : '' ?>>Seal M Sea</option>
                    <option value="harry-potter" <?= ($games['tipe_target'] == 'harry-potter') ? 'selected' : '' ?>>Harry Potter</option>
                </select>
              </div>
              <div class="sm:col-span-2">
                <label for="validasi Nickname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Validasi Nickname</label>
                  <select class="custom-input block w-full" name="validasi_status" required>
                  <option value="NO" <?= ($games['validasi_status'] == 'NO') ? 'selected' : '' ?>>No</option>
                    <option value="YA" <?= ($games['validasi_status'] == 'YA') ? 'selected' : '' ?>>Ya</option>
                </select>
              </div>
              <div class="sm:col-span-2">
                <label for="validasi_kode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Validasi Kode</label>
                <input type="text" name="validasi_kode" class="custom-input block w-full" value="<?= $games['validasi_kode'] ?>" required>
              </div>
              <div class="mb-3">
                <label for="logo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Logo</label>
                <input type="file" name="gambar" class="custom-input block w-full" value="<?= $games['gambar'] ?>">
              </div>
              <div class="mb-3">
                <label for="banner" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Banner</label>
                <input type="file" name="banner" class="custom-input block w-full" value="<?= $games['banner'] ?>">
              </div>
          </div>
          <div class="flex mt-5 items-center">
            <div class="inline-flex">
              <button type="submit" class="text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center me-2">Simpan</button>
              <a href="<?= base_url('admin/games') ?>" type="button" class="text-white bg-red-600 hover:bg-red-700 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Batal</a>
            </div>
          </div>
      </form>
  </div>
</section>

<?= $this->endSection(); ?>