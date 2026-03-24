<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<section class="bg-murky-900 py-8">
  <div class="mx-auto max-w-screen-xl px-4">
    <div class="mx-auto max-w-5xl">
      <div>
        <img class="w-full rounded-lg" src="<?= base_url(); ?>public/img/berita/<?= $berita['gambar'] ?>" alt="<?= $berita['judul'] ?>" />
      </div>
      <h2 class="my-6 text-2xl font-semibold text-white sm:text-2xl"><?= $berita['judul'] ?></h2>
      <div class="mx-auto max-w-2xl space-y-6">
        <p class="font-normal text-white"><?= $berita['deskripsi'] ?></p>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>