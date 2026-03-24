<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<section class="bg-murky-900">
  <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:grid-cols-12">
      <div class="mr-auto place-self-center lg:col-span-7">
          <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">Hubungi Kami!</h1>
          <p class="max-w-2xl mb-6 font-light lg:mb-8 md:text-lg lg:text-xl text-gray-300">Mengalami masalah dengan transaksi anda atau yang lainnya? Silakan masukkan laporan atau permintaan anda pada form yang tersedia.</p>
      </div>
      <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
          <img src="<?= base_url(); ?>public/img/vector/kontak.svg" alt="Xosgames.com">
      </div>                
  </div>
</section>

<section class="bg-murky-900">
  <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
      <form id="contactForm" class="space-y-6">
          <div>
            <label for="pelapor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pelapor</label>
            <select id="pelapor" class="custom-input block w-full">
              <option>Individu</option>
              <option>Perusahaan</option>
            </select>
          </div>
          <div>
            <label for="tipe" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipe</label>
            <select id="tipe" class="custom-input block w-full">
              <option>Pilih Tipe</option>
              <option value="Pengaduan Pelayanan Chat">Pengaduan Pelayanan Chat</option>
              <option value="Masalah Akun">Masalah Akun</option>
              <option value="Masalah Transaksi">Masalah Transaksi</option>
              <option value="Daftar Reseller">Daftar Reseller</option>
              <option value="Penawaran Kerjasama">Penawaran Kerjasama</option>
              <option value="Request Fitur">Request Fitur</option>
            </select>
          </div>
          <div>
              <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Anda</label>
              <input id="nama" type="text" class="custom-input block w-full" placeholder="Nama Anda" required>
          </div>
          <div>
              <label for="whatsapp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor WhatsApp</label>
              <input id="whatsapp" type="number" class="custom-input block w-full" placeholder="Nomor WhatsApp" required>
          </div>
          <div class="sm:col-span-2">
              <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
              <textarea id="deskripsi" rows="6" class="custom-input block w-full" placeholder="Tulis Pesan Anda..."></textarea>
          </div>
          <button type="submit" class="py-2 px-5 text-sm font-medium text-center text-white rounded-lg x-bg-g sm:w-fit">Kirim Pesan</button>
      </form>
  </div>
</section>

<script>
  document.getElementById("contactForm").addEventListener("submit", function(event) {
    event.preventDefault();
    let pelapor = document.getElementById("pelapor").value;
    let tipe = document.getElementById("tipe").value;
    let nama = document.getElementById("nama").value;
    let whatsapp = document.getElementById("whatsapp").value;
    let deskripsi = document.getElementById("deskripsi").value;
    let message = 
      "Halo, saya ingin melaporkan\n\n" +
      "*Pelapor* : " + pelapor + "\n" +
      "*Tipe* : " + tipe + "\n" +
      "*Nama* : " + nama + "\n" +
      "*WhatsApp* : " + whatsapp + "\n" +
      "*Deskripsi* : " + deskripsi + "\n\n" +
      "*Terimakasih*";

    let whatsappLink = "https://wa.me/<?= $web['whatsapp_cs'] ?>?text=" + encodeURIComponent(message);
    window.open(whatsappLink, "_blank");
  });
</script>

<?= $this->endSection() ?>