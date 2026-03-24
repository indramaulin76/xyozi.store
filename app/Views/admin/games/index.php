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
  <p class="text-xl font-semibold text-left rtl:text-right text-gray-900 dark:text-white">Data Games</p>
  <div class="relative overflow-x-auto mt-4">
      <div class="mt-1">
          <input type="text" id="table-search" class="custom-input block w-full" placeholder="Search...">
      </div>
  </div>
  <button type="button" class="bg-blue-500 text-white font-medium rounded-lg text-sm px-3 py-2 mt-3" data-modal-target="tambah-modal" data-modal-toggle="tambah-modal">
    Tambah Games
  </button>
  <div class="relative overflow-x-auto mt-4">
      <table class="w-full text-sm text-left rtl:text-right text-white" id="table">
          <thead class="whitespace-nowrap">
              <tr class="border-y border-murky-800 bg-murky-900 whitespace-nowrap">
                  <th scope="col" class="px-6 py-3">
                      No
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Logo
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Nama
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Brand
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Kategori
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Aksi
                  </th>
              </tr>
          </thead>
          <tbody class="text-center">
              <?php foreach ($games as $index => $g) : ?>
                  <tr class="whitespace-nowrap">
                      <td class="px-6 py-4">
                          <?= $index + 1 ?></td>
                      <td class="px-6 py-4">
                        <img src="<?= base_url(); ?>public/img/games/<?= $g['gambar'] ?>" class="rounded" style="width:40px; height:40px; object-fit:cover;">
                      </td>
                      <td class="px-6 py-4">
                          <?= $g['nama'] ?>
                      </td>
                      <td class="px-6 py-4">
                          <?= $g['brand'] ?>
                      </td>
                      <td class="px-6 py-4">
                          <?= $g['kategori'] ?>
                      </td>
                      <td class="px-6 py-4">
        								<div class="flex">
        									<a href="<?= base_url('admin/games/edit/' . $g['id']) ?>" type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 font-medium rounded-lg text-sm px-3 py-1 me-2">Edit</a>
        									<a href="<?= base_url('admin/games/hapus/' . $g['id']) ?>" type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm px-3 py-1 me-2">Hapus</a>
        								</div>		
        							</td>
                  </tr>
              <?php endforeach; ?>
          </tbody>
      </table>
      <div class="flex justify-center mt-5 items-center">
          <div class="inline-flex" id="custom-paging">
              <button class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-murky-800 rounded-s hover:bg-murky-800 hover:text-white" id="prev-button">
                  Prev
              </button>
              <button class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-murky-800 rounded-s hover:bg-murky-800 hover:text-white" id="next-button">
                  Next
              </button>
          </div>
      </div>
  </div>
</section>

<!-- Tambah Modal -->
<div id="tambah-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <div class="relative bg-murky-800 rounded-lg shadow">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-white">
                    Tambah Games
                </h3>
                <button type="button" class="bg-murky-800 inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg hover:bg-murky-800 focus:outline-none" data-modal-hide="tambah-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5 space-y-4">
              <form action="<?= base_url('admin/games/tambah') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                  <div class="mb-3">
                    <label for="nama" class="block mb-2 text-sm font-medium text-white">Nama Games</label>
                    <input type="text" name="nama" class="custom-input block w-full" placeholder="Masukkan nama games" required>
                  </div>
                  <div class="mb-3">
                    <label for="sub_nama" class="block mb-2 text-sm font-medium text-white">Sub Nama Games</label>
                    <input type="text" name="sub_nama" class="custom-input block w-full" placeholder="Masukkan sub nama games" required>
                  </div>
                  <div class="mb-3">
                    <label for="brand" class="block mb-2 text-sm font-medium text-white">Brand</label>
                    <input type="text" name="brand" class="custom-input block w-full" placeholder="Masukkan brand" required>
                  </div>
                  <div class="mb-3">
                    <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                    <select class="custom-input block w-full" name="kategori" required>
                      <?php foreach ($kategori as $k): ?>
                      <option value="<?= $k['nama'] ?>"><?= $k['nama'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="populer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipe Populer?</label>
                    <select class="custom-input block w-full" name="tipe" required>
                      <option value="Tidak">Tidak</option>
                        <option value="Populer">Ya</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="informasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Informasi</label>
                    <textarea type="text" name="informasi" class="custom-input block w-full" placeholder="Masukkan Informasi" required></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="panduan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Panduan</label>
                    <textarea type="text" name="panduan" class="custom-input block w-full" placeholder="Masukkan Panduan" required></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="target" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipe Target</label>
                    <select class="custom-input block w-full" name="tipe_target" required>
                      <option value="Id">ID (number)</option>
                      <option value="Id_text">ID (text)</option>
                      <option value="Id-Server">ID (text) & Server</option>
                      <option value="Id_number-server">ID (number) & Server</option>
                      <option value="Nomor">Nomor Hp</option>
                      <option value="Email">Email</option>
                      <option value="PLN">PLN</option>
                      <option value="genshin-impact">Genshin Impact</option>
                      <option value="ragnarok-origin">Ragnarok Origin</option>
                      <option value="ragnarok-m">Ragnarok M</option>
                      <option value="tower-of-fantasy">Tower Of Fantasy</option>
                      <option value="ace-racer">Ace Racer</option>
                      <option value="seal-m-sea">Seal M Sea</option>
                      <option value="harry-potter">Harry Potter</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="validasi_status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Validasi Status</label>
                    <select class="custom-input block w-full" name="validasi_status" required>
                      <option value="NO">No</option>
                      <option value="YA">Ya</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="validasi_kode" class="block mb-2 text-sm font-medium text-white">Validasi Kode</label>
                    <input type="text" name="validasi_kode" class="custom-input block w-full" placeholder="Masukkan validasi kode" required>
                  </div>
                  <div class="mb-3">
                    <label for="logo" class="block mb-2 text-sm font-medium text-white">Logo</label>
                    <input type="file" id="small_size" name="gambar" class="custom-input block w-full cursor-pointer"
                    required>
                  </div>
                  <div class="mb-3">
                    <label for="banner" class="block mb-2 text-sm font-medium text-white">Banner</label>
                    <input type="file" id="small_size" name="banner" class="custom-input block w-full cursor-pointer"
                    required>
                  </div>
                <div class="flex items-center justify-end p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 me-2 text-center">Simpan</button>
                    <button data-modal-hide="tambah-modal" type="button" class="bg-red-700 inline-flex items-center py-2 px-3 justify-center text-sm text-white rounded-lg hover:bg-murky-700 focus:outline-none">Tutup</button>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    var table = $('#table').DataTable({
        lengthChange: false,
        dom: 'rtip',
        pagingType: 'simple',
        pageLength: 10,
    });
    
    $('.dataTables_paginate').hide();
    
    $('#table-search').on('keyup', function() {
        table.search(this.value).draw();
    });
    
    $('#table-search').on('change', function() {
        if (!this.value) {
            table.search('').draw();
        }
    });
    
    $('#prev-button').on('click', function() {
        table.page('previous').draw('page');
    });
    
    $('#next-button').on('click', function() {
        table.page('next').draw('page');
        initializeModals(); // Panggil fungsi inisialisasi modal setiap kali tabel halaman berubah
    });
    
    table.on('draw', function() {
        var info = table.page.info();
        var start = info.start + 1;
        var end = Math.min(info.start + info.length, info.recordsTotal);
        var totalEntries = info.recordsTotal;

        var pagingInfo = 'Showing ' + start + ' to ' + end + ' of ' + totalEntries + ' Entries';
        $('#paging-info').html(pagingInfo);
        
        $('#prev-button').prop('disabled', info.page === 0);
        
        $('#next-button').prop('disabled', info.page === info.pages - 1);
    });
    
    // Fungsi untuk menginisialisasi modal
    function initializeModals() {
        $('[data-modal-toggle]').each(function() {
            var target = $(this).data('modal-target');
            $(this).on('click', function() {
                $(target).modal('show');
            });
        });
    }

    // Inisialisasi modal pertama kali
    initializeModals();
});

var quillDeskripsi = new Quill('#editorDeskripsi', {
    theme: 'snow'
});
quillDeskripsi.on('text-change', function() {
    var deskripsiInput = document.getElementById('deskripsi');
    deskripsiInput.value = quillDeskripsi.root.innerHTML;
});
var quillInformasi = new Quill('#editorInformasi', {
    theme: 'snow'
});
quillInformasi.on('text-change', function() {
    var informasiInput = document.getElementById('informasi');
    informasiInput.value = quillInformasi.root.innerHTML;
});
var quillPanduan = new Quill('#editorPanduan', {
    theme: 'snow'
});
quillPanduan.on('text-change', function() {
    var panduanInput = document.getElementById('panduan');
    panduanInput.value = quillPanduan.root.innerHTML;
});

<?php foreach ($games as $key => $g): ?>
    var quillInformasi<?= $key ?> = new Quill('#editorInformasi<?= $key ?>', {
        theme: 'snow'
    });

    var existingInformasi<?= $key ?> = document.getElementById('informasi<?= $key ?>').value;
    quillInformasi<?= $key ?>.root.innerHTML = existingInformasi<?= $key ?>;

    quillInformasi<?= $key ?>.on('text-change', function() {
        var informasiInput<?= $key ?> = document.getElementById('informasi<?= $key ?>');
        informasiInput<?= $key ?>.value = quillInformasi<?= $key ?>.root.innerHTML;
    });
    
    var quillDeskripsi<?= $key ?> = new Quill('#editorDeskripsi<?= $key ?>', {
        theme: 'snow'
    });

    var existingDeskripsi<?= $key ?> = document.getElementById('deskripsi<?= $key ?>').value;
    quillDeskripsi<?= $key ?>.root.innerHTML = existingDeskripsi<?= $key ?>;

    quillDeskripsi<?= $key ?>.on('text-change', function() {
        var deskripsiInput<?= $key ?> = document.getElementById('deskripsi<?= $key ?>');
        deskripsiInput<?= $key ?>.value = quillDeskripsi<?= $key ?>.root.innerHTML;
    });
    
    var quillPanduan<?= $key ?> = new Quill('#editorPanduan<?= $key ?>', {
        theme: 'snow'
    });

    var existingPanduan<?= $key ?> = document.getElementById('panduan<?= $key ?>').value;
    quillPanduan<?= $key ?>.root.innerHTML = existingPanduan<?= $key ?>;

    quillPanduan<?= $key ?>.on('text-change', function() {
        var panduanInput<?= $key ?> = document.getElementById('panduan<?= $key ?>');
        panduanInput<?= $key ?>.value = quillPanduan<?= $key ?>.root.innerHTML;
    });
<?php endforeach; ?>
</script>

<?= $this->endSection() ?>