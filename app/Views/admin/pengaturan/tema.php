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
      <h2 class="mb-8 text-xl font-bold text-white">Tema</h2>
      <form action="<?= base_url('admin/tema/update') ?>" method="post" enctype="multipart/form-data">
          <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 space-y-3">
              <div class="w-full">
                  <label for="text_color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Text Color</label>
                  <input type="text" name="text_color" class="custom-input block w-full" value="<?= $tema['text_color'] ?>" required>
              </div>
              <div class="w-full">
                  <label for="background_color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Background Color</label>
                  <input type="text" name="background_color" class="custom-input block w-full" value="<?= $tema['background_color'] ?>" required>
              </div>
              <div class="w-full">
                  <label for="border_color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Border Color</label>
                  <input type="text" name="border_color" class="custom-input block w-full" value="<?= $tema['border_color'] ?>" required>
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