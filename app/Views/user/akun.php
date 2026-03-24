<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<section class="bg-murky-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-16">
      <div class="flex flex-col gap-3 w-full max-w-screen-xl sm:items-center">
        <div class="grid md:grid-cols-2 gap-4 space-y-8 md:space-y-0">
          <div>
            <p class="text-2xl font-bold text-gray-900 dark:text-white">Profil</p>
            <span class="text-sm text-gray-500 dark:text-gray-300">Informasi ini bersifat rahasia, jadi berhati-hatilah dengan apa yang Anda bagikan.</span>
            <form method="post" action="<?= base_url('dashboard/akun/updateProfil'); ?>">
              <div class="mt-5 mb-5">
                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Anda</label>
                <input type="text" name="nama" class="custom-input block w-full" value="<?= $user['nama'] ?>" required />
              </div>
              <div class="mb-5">
                <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                <input type="text" name="username" class="custom-input block w-full" value="<?= $user['username'] ?>" disabled />
              </div>
              <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Email</label>
                <input type="email" name="email" class="custom-input block w-full" value="<?= $user['email'] ?>" required />
              </div>
              <div class="mb-5">
                <label for="whatsapp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. Whatsapp</label>
                <input type="number" name="whatsapp" class="custom-input block w-full" value="<?= $user['whatsapp'] ?>" required />
              </div>
              <div class="mb-5">
                <label for="api_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Api ID</label>
                <input type="text" name="api_id" class="custom-input block w-full" value="<?= $user['api_id'] ?>" disabled />
              </div>
              <div class="mb-5">
                <label for="api_key" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Api Key</label>
                <input type="text" name="api_key" class="custom-input block w-full" value="<?= $user['api_key'] ?>" disabled />
              </div>
              <div class="mb-5">
                <label for="whitelist_ip" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Whitelist IP</label>
                <input type="text" name="whitelist_ip" class="custom-input block w-full" value="<?= $user['whitelist_ip'] ?>"/>
                <span class="text-xs text-red-500">Pisahkan dengan tanda ( , ) jika memasukan lebih dari 1 ip</span>
              </div>
              <button type="submit" class="text-white x-bg-g font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ubah Profil</button>
            </form>
          </div>
          <div>
            <p class="text-2xl font-bold text-gray-900 dark:text-white">Ubah Kata Sandi</p>
            <span class="text-sm text-gray-500 dark:text-gray-300">Pastikan Anda mengingat kata sandi baru Anda sebelum mengubahnya.</span>
            <form method="post" action="<?= base_url('dashboard/akun/updatePassword'); ?>">
              <div class="mt-5 mb-5">
                <label for="current_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kata Sandi Saat Ini</label>
                <input type="password" name="current_password" class="custom-input block w-full" placeholder="Kata Sandi Saat Ini" required />
              </div>
              <div class="mb-5">
                <label for="new_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kata Sandi Baru</label>
                <input type="password" name="new_password" class="custom-input block w-full" placeholder="Kata Sandi Baru" required />
              </div>
              <div class="mb-5">
                <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi Kata Sandi Baru</label>
                <input type="password" name="confirm_password" class="custom-input block w-full" placeholder="Konfirmasi Kata Sandi Baru" required />
              </div>
              <button type="submit" class="text-white x-bg-g font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ubah Kata Sandi</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</section>

<?php if (session()->getFlashdata('success')): ?>
    <script>
        var notyf = new Notyf({
          duration: 4000,
          position: {
            x: 'right',
            y: 'top',
          },
        });
        notyf.success('<?php echo session()->getFlashdata('success'); ?>');
    </script>
<?php elseif (session()->getFlashdata('error')): ?>
    <script>
        var notyf = new Notyf({
          duration: 4000,
          position: {
            x: 'right',
            y: 'top',
          },
        });
        notyf.error('<?php echo session()->getFlashdata('error'); ?>');
    </script>
<?php endif; ?>

<?= $this->endSection() ?>