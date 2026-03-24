<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<section class="bg-murky-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-16">
      <div class="flex flex-col gap-3 w-full max-w-screen-xl items-center">
        <div class="w-full max-w-sm mx-auto">
          <form method="post" action="<?= base_url('daftar/validasi'); ?>" class="max-w-sm mx-auto">
            <p class="text-3xl text-gray-900 dark:text-white">Daftar</p>
            <span class="text-sm text-gray-500 dark:text-gray-300">Masukkan informasi pendaftaran yang valid.</span>
            <div class="mt-5 mb-5">
              <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
              <input type="text" name="username" class="custom-input block w-full" placeholder="Username" required />
            </div>
            <div class="mb-5">
              <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama lengkap</label>
              <input type="text" name="nama" class="custom-input block w-full" placeholder="Nama lengkap" required />
            </div>
            <div class="mb-5">
              <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat email</label>
              <input type="email" name="email" class="custom-input block w-full" placeholder="Alamat email" required />
            </div>
            <div class="mb-5">
              <label for="whatsapp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor whatsapp</label>
              <input type="text" name="whatsapp" class="custom-input block w-full" placeholder="Nomor whatsapp" required />
            </div>
            <div class="mb-5">
              <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kata sandi</label>
              <input type="password" name="password" class="custom-input block w-full" placeholder="Kata sandi" required />
            </div>
            <div class="mb-5">
              <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi kata sandi</label>
              <input type="password" name="confirm" class="custom-input block w-full" placeholder="Konfirmasi kata sandi" required />
            </div>
            <div class="flex items-start mb-5">
              <div class="flex items-center h-5">
                <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" />
              </div>
              <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Saya setuju dengan <span class="text-sm font-medium text-red-700 dark:text-red-500"><a href="<?= base_url(); ?>">Syarat dan Ketentuan</a></span> dan <span class="text-sm font-medium text-red-700 dark:text-red-500"><a href="<?= base_url(); ?>">Kebijakan Pribadi</a>.</span></label>
            </div>
            <button type="submit" class="text-white x-bg-g font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Daftar</button>
          </form>
          <div class="mt-8 mb-5">
            <label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sudah memiliki akun?</label>
          </div>
          <a href="<?= base_url('masuk'); ?>" type="button" class="focus:outline-none text-white bg-murky-800 hover:bg-murky-800 focus:ring-none focus:ring-gray-300 font-medium w-full rounded-lg text-sm px-5 py-2.5 me-2 mb-2 text-center">Masuk</a>
        </div>
      </div>
    </div>
</section>

<?php
    $session = session();
    $error = $session->getFlashdata('error');
?>
<?php if (session()->getFlashdata('error')): ?>
    <?php foreach(session()->getFlashdata('error') as $error): ?>
    <script>
        var notyf = new Notyf({
          duration: 4000,
          position: {
            x: 'right',
            y: 'top',
          },
        });
        notyf.error('<?php echo $error; ?>');
    </script>
    <?php endforeach; ?>
<?php endif; ?>


<?= $this->endSection() ?>