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
  <p class="text-xl font-semibold text-left rtl:text-right text-gray-900 dark:text-white">Data Metode</p>
  <div class="relative overflow-x-auto mt-4">
      <div class="mt-1">
          <input type="text" id="table-search" class="custom-input block w-full" placeholder="Search...">
      </div>
  </div>
  <button type="button" class="bg-blue-500 text-white font-medium rounded-lg text-sm px-3 py-2 mt-3" data-modal-target="tambah-modal" data-modal-toggle="tambah-modal">
    Tambah Metode
  </button>
  <div class="relative overflow-x-auto mt-4">
      <table class="w-full text-sm text-left rtl:text-right text-white" id="table">
          <thead class="whitespace-nowrap">
              <tr class="border-y border-murky-800 bg-murky-900 whitespace-nowrap">
                  <th scope="col" class="px-6 py-3">
                      No
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Gambar
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Nama
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Keterangan
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Kode
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Kategori
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Aksi
                  </th>
              </tr>
          </thead>
          <tbody>
              <?php foreach ($metode as $index => $m): ?>
                  <tr class="whitespace-nowrap">
                      <td class="px-6 py-4">
                          <?= $index + 1 ?></td>
                      <td class="px-6 py-4">
                          <img src="<?= base_url(); ?>public/img/metode/<?= $m['gambar'] ?>" class="w-24 h-7">
                      </td>
                      <td class="px-6 py-4">
                          <?= $m['nama'] ?>
                      </td>
                      <td class="px-6 py-4">
                          <?= $m['keterangan'] ?>
                      </td>
                      <td class="px-6 py-4">
                          <?= $m['kode'] ?>
                      </td>
                      <td class="px-6 py-4">
                          <?= $m['kategori'] ?></td>
                      <td class="px-6 py-4">
        								<div class="flex">
        								  <a href="<?= base_url('admin/metode-pembayaran/edit/' . $m['id']) ?>" type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 font-medium rounded-lg text-sm px-3 py-1 me-2">Edit</a>
        									<button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm px-3 py-1 me-2" data-modal-target="hapus-modal<?= $m['id'] ?>" data-modal-toggle="hapus-modal<?= $m['id'] ?>">Hapus</button>
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
                    Tambah Metode
                </h3>
                <button type="button" class="bg-murky-800 inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg hover:bg-murky-800 focus:outline-none" data-modal-hide="tambah-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5 space-y-4">
              <form action="<?= base_url('admin/metode/tambah') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                  <div class="mb-3">
                    <label for="nama" class="block mb-2 text-sm font-medium text-white">Nama Metode</label>
                    <input type="text" name="nama" class="custom-input block w-full" placeholder="Masukkan nama metode" required>
                  </div>
                  <div class="mb-3">
                    <label for="keterangan" class="block mb-2 text-sm font-medium text-white">Keterangan</label>
                    <input type="text" name="keterangan" class="custom-input block w-full" placeholder="Masukkan keterangan" required>
                  </div>
                  <div class="mb-3">
                    <label for="kode" class="block mb-2 text-sm font-medium text-white">Kode</label>
                    <input type="text" name="kode" class="custom-input block w-full" placeholder="Masukkan kode metode" required>
                  </div>
                  <div class="mb-3">
                    <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                    <select class="custom-input block w-full" name="kategori" required>
                      <option value="virtual-account">Virtual Account</option>
                      <option value="ewallet">Ewallet</option>
                      <option value="retail">Retail</option>
                      <option value="pulsa">Pulsa</option>
                      <option value="saldo">Saldo</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="gambar" class="block mb-2 text-sm font-medium text-white">Gambar</label>
                    <input type="file" name="gambar" class="custom-input block w-full" required>
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

<?php foreach ($metode as $key => $m): ?>
<!-- Modal Konfirmasi Hapus -->
<div id="hapus-modal<?= $m['id'] ?>" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-murky-800 rounded-lg shadow">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="hapus-modal<?= $m['id'] ?>">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-white">Apakah Anda yakin ingin menghapus data metode ini?</h3>
                <button onclick="window.location.href='<?= base_url('admin/metode/hapus/' . $m['id']) ?>'" type="button" class="text-white bg-red-600 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                    Hapus
                </button>
                <button data-modal-hide="hapus-modal<?= $m['id'] ?>" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-white focus:outline-none bg-murky-700 rounded-lg">Batal</button>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

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
  });
</script>

<?= $this->endSection() ?>