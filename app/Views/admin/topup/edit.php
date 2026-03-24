<?php $this->extend('admin/template'); ?>
<?= $this->section('content') ?>

<section class="bg-murky-900 mb-8">
  <div class="px-4 mx-auto w-full">
      <h2 class="mb-4 text-xl font-bold text-white">Edit Topup #<?= $topup['topup_id'] ?></h2>
      <form action="<?= base_url('admin/topup/update/' . $topup['id']) ?>" method="post" enctype="multipart/form-data">
          <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
              <div class="w-full">
                <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                <select class="custom-input block w-full" name="status" required>
                  <option value="Unpaid">Unpaid</option>
                    <option value="Paid">Paid</option>
                </select>
              </div>
          </div>
          <div class="flex mt-5 items-center">
            <div class="inline-flex">
              <button type="submit" class="text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center me-2">Simpan</button>
              <a href="<?= base_url('admin/topup') ?>" type="button" class="text-white bg-red-600 hover:bg-red-700 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Batal</a>
            </div>
          </div>
      </form>
  </div>
</section>

<?= $this->endSection(); ?>