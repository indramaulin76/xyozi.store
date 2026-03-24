<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<section class="bg-murky-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-16">
      <div class="flex flex-col gap-3 w-full max-w-screen-xl sm:items-center">
        <div class="w-full max-w-sm mx-auto">
          <form method="post" action="<?= base_url('validasi-reset-password'); ?>" class="max-w-sm mx-auto">
          <p class="text-3xl text-gray-900 dark:text-white">Lupa Password ?</p>
          <span class="text-sm text-gray-500 dark:text-gray-300">Lupa Password Anda? Tidak apa-apa. Beri tahu kami nomor whatsapp anda dan kami akan mengirimkan kode OTP yang akan digunakan sebagai verifikasi untuk membuat password baru anda.</span>
            <div class="mt-5 mb-5">
              <label for="whatsapp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor whatsapp</label>
              <input type="number" id="nomor_telepon" name="nomor_telepon" class="custom-input block w-full" placeholder="Nomor whatsapp" required />
            </div>
            <button type="submit" class="text-white x-bg-g font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kirim kode OTP</button>
          </form>
          <div class="mt-8 mb-5">
            <label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ingin membuat akun baru saja?</label>
          </div>
          <a href="<?= base_url('daftar'); ?>" type="button" class="focus:outline-none text-white bg-murky-800 hover:bg-murky-800 focus:ring-none focus:ring-gray-300 font-medium w-full rounded-lg text-sm px-5 py-2.5 me-2 mb-2 text-center">Daftar</a>
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