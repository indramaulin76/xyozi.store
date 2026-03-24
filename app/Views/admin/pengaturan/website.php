<?php $this->extend('admin/template'); ?>
<?= $this->section('content') ?>

<section class="bg-murky-900 mb-8">
  <?php if (session()->getFlashdata('success')) : ?>
    <div class="p-4 mb-4 text-sm text-green-400 rounded-lg bg-murky-800" role="alert">
      <span class="font-medium">Sukses!</span> <?= session()->getFlashdata('success') ?>
    </div>
  <?php endif; ?>
  <?php if (session()->getFlashdata('error')) : ?>
    <div class="p-4 mb-4 text-sm text-red-400 rounded-lg bg-murky-800" role="alert">
      <span class="font-medium">Gagal!</span> <?= session()->getFlashdata('error') ?>
    </div>
  <?php endif; ?>
  <?php if (session()->getFlashdata('info')) : ?>
    <div class="p-4 mb-4 text-sm text-yellow-300 rounded-lg bg-murky-800" role="alert">
      <span class="font-medium">Warning!</span> <?= session()->getFlashdata('info') ?>
    </div>
  <?php endif; ?>
  
  <div class="px-4 mx-auto w-full">
      <h2 class="mb-8 text-xl font-bold text-white">Pengaturan Website</h2>
      <form action="<?= base_url('admin/website/update') ?>" method="post" enctype="multipart/form-data">
          <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 space-y-3">
              <div class="w-full">
                <?php if (!empty($settings['web_icon'])) : ?>
                <div>
                  <img src="<?= base_url('public/img/web/' . $settings['web_icon']) ?>" alt="Web Icon" class="mb-2" style="width: 50px;">
                </div>
                <?php endif; ?>
                  <label for="icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Icon</label>
                  <input type="file" name="web_icon" class="custom-input block w-full" accept="image/*">
              </div>
              <div class="w-full">
                <?php if (!empty($settings['web_logo'])) : ?>
                <div>
                  <img src="<?= base_url('public/img/web/' . $settings['web_logo']) ?>" alt="Web Logo" class="mb-2" style="width: 150px; height: 50px;">
                </div>
                <?php endif; ?>
                  <label for="logo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Logo</label>
                  <input type="file" name="web_logo" class="custom-input block w-full" accept="image/*">
              </div>
              <div class="w-full">
                  <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title Website</label>
                  <input type="text" name="web_title" class="custom-input block w-full" value="<?= $settings['web_title'] ?>" required>
              </div>
              <div class="w-full">
                  <label for="author" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Author</label>
                  <input type="text" name="web_author" class="custom-input block w-full" value="<?= $settings['web_author'] ?>" required>
              </div>
              <div class="w-full">
                  <label for="keywords" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keywords</label>
                  <input type="text" name="web_keywords" class="custom-input block w-full" value="<?= $settings['web_keywords'] ?>" required>
              </div>
              <div class="w-full">
                  <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi Website</label>
                  <textarea type="text" name="web_description" class="custom-input block w-full" required><?= $settings['web_description'] ?></textarea>
              </div>
              <div class="w-full">
                  <label for="whatsApp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">WhatsApp Admin</label>
                  <input type="number" name="whatsapp_admin" class="custom-input block w-full" value="<?= $settings['whatsapp_admin'] ?>" required>
              </div>
              <div class="w-full">
                  <label for="instagram" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instagram</label>
                  <input type="text" name="instagram" class="custom-input block w-full" value="<?= $settings['instagram'] ?>" required>
              </div>
              <div class="w-full">
                  <label for="tiktok" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tiktok</label>
                  <input type="text" name="tiktok" class="custom-input block w-full" value="<?= $settings['tiktok'] ?>" required>
              </div>
              <div class="w-full">
                  <label for="whatsapp_cs" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">WhatsApp CS</label>
                  <input type="number" name="whatsapp_cs" class="custom-input block w-full" value="<?= $settings['whatsapp_cs'] ?>" required>
              </div>
              <div class="w-full">
                  <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email CS</label>
                  <input type="email" name="email" class="custom-input block w-full" value="<?= $settings['email'] ?>" required>
              </div>
          </div>
          <div class="flex mt-5 items-center">
            <div class="inline-flex">
              <button type="submit" class="text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center me-2">Simpan</button>
            </div>
          </div>
      </form>
  </div>
</section>

<?php $this->endSection(); ?>