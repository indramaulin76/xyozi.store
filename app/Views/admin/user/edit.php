<?php $this->extend('admin/template'); ?>
<?= $this->section('content') ?>

<section class="bg-murky-900 mb-8">
  <div class="px-4 mx-auto w-full">
      <h2 class="mb-4 text-xl font-bold text-white">Edit User #<?= esc($user['username'], 'html') ?></h2>
      <form action="<?= base_url('admin/user/update/' . $user['id']) ?>" method="post" enctype="multipart/form-data">
          <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
            <div class="w-full">
              <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
              <input type="text" name="nama" class="custom-input block w-full" value="<?= esc($user['nama'], 'html') ?>" required>
            </div>
            <div class="w-full">
              <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
              <input type="text" name="username" class="custom-input block w-full" value="<?= esc($user['username'], 'html') ?>" required>
            </div>
            <div class="w-full">
              <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
              <input type="email" name="email" class="custom-input block w-full" value="<?= esc($user['email'], 'html') ?>" required>
            </div>
            <div class="w-full">
              <label for="whatsapp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">WhatsApp</label>
              <input type="number" name="whatsapp" class="custom-input block w-full" value="<?= esc($user['whatsapp'], 'html') ?>" required>
            </div>
            <div class="w-full">
              <label for="saldo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Saldo</label>
              <input type="number" name="balance" class="custom-input block w-full" value="<?= esc($user['balance'], 'html') ?>" required>
            </div>
            <div class="w-full">
              <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
              <select class="custom-input block w-full" name="role" required>
                <option value="admin" <?= ($user['role'] == 'admin') ? 'selected' : '' ?>>Admin</option>
                      <option value="Basic" <?= ($user['role'] == 'Basic') ? 'selected' : '' ?>>Basic</option>
                      <option value="Gold" <?= ($user['role'] == 'Gold') ? 'selected' : '' ?>>Gold</option>
                      <option value="Platinum" <?= ($user['role'] == 'Platinum') ? 'selected' : '' ?>>Platinum</option>
              </select>
            </div>
            <div class="w-full">
              <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
              <input type="password" name="password" class="custom-input block w-full" placeholder="Masukkan password baru">
            </div>
            <div class="w-full">
              <label for="konfirmasi_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi Password Baru</label>
              <input type="password" name="confirm_password" class="custom-input block w-full" placeholder="Konfirmasi password baru">
            </div>
          </div>
          <div class="flex mt-5 items-center">
            <div class="inline-flex">
              <button type="submit" class="text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center me-2">Simpan</button>
              <a href="<?= base_url('admin/user') ?>" type="button" class="text-white bg-red-600 hover:bg-red-700 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Batal</a>
            </div>
          </div>
      </form>
  </div>
</section>

<?= $this->endSection(); ?>