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
          <tbody>
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
        									<button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-1 me-2 focus:outline-none" data-modal-target="detail-modal<?= $g['id'] ?>" data-modal-toggle="detail-modal<?= $g['id'] ?>">Detail</button>
        									<button type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 font-medium rounded-lg text-sm px-3 py-1 me-2" data-modal-target="edit-modal<?= $g['id'] ?>" data-modal-toggle="edit-modal<?= $g['id'] ?>">Edit</button>
        									<button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm px-3 py-1 me-2" data-modal-target="hapus-modal<?= $g['id'] ?>" data-modal-toggle="hapus-modal<?= $g['id'] ?>">Hapus</button>
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
                      <option value="Id">ID</option>
                      <option value="Id-Server">ID & Server</option>
                      <option value="genshin-impact">Genshin Impact</option>
                      <option value="Nomor">Nomor Hp</option>
                      <option value="Email">Email</option>
                      <option value="PLN">PLN</option>
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

<?php foreach ($games as $key => $g): ?>
  <!-- Detail Modal -->
  <div id="detail-modal<?= $g['id'] ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <div class="relative bg-murky-800 rounded-lg shadow">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-white">
                    Detail Games #<?= $g['nama'] ?>
                </h3>
                <button type="button" class="bg-murky-800 inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg hover:bg-murky-800 focus:outline-none" data-modal-hide="detail-modal<?= $g['id'] ?>">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5 space-y-4">
              <table class="table text-white text-left">
                  <tr class="border-b border-murky-600">
                    <th class="py-2">Logo</th>
                    <td><img src="<?= base_url(); ?>public/img/games/<?= $g['gambar'] ?>" class="rounded-lg mb-2" style="width:80px; height:100px; object-fit:cover;"></td>
                  </tr>
                  <tr class="border-b border-murky-600">
                    <th class="py-2">Banner</th>
                    <td><img src="<?= base_url(); ?>public/img/games/<?= $g['banner'] ?>" class="rounded-lg my-2" style="width:150px; height:80px; object-fit:cover;"></td>
                  </tr>
                  <tr class="border-b border-murky-600">
                    <th class="py-2">Nama Games</th>
                    <td><?= $g['nama'] ?></td>
                  </tr>
                  <tr class="border-b border-murky-600">
                    <th class="py-2">Sub Nama Games</th>
                    <td><?= $g['sub_nama'] ?></td>
                  </tr>
                  <tr class="border-b border-murky-600">
                    <th class="py-2">Brand</th>
                    <td><?= $g['brand'] ?></td>
                  </tr>
                  <tr class="border-b border-murky-600">
                    <th class="py-2">Kategori</th>
                    <td><?= $g['kategori'] ?></td>
                  </tr>
                  <tr class="border-b border-murky-600">
                    <th class="py-2">Informasi</th>
                    <td><textarea class="custom-input block w-full my-2" placeholder="<?= $g['informasi'] ?>" style="height: 100px" disabled></textarea></td>
                  </tr>
                  <tr class="border-b border-murky-600">
                    <th class="py-2">Panduan</th>
                    <td><textarea class="custom-input block w-full my-2" placeholder="<?= $g['panduan'] ?>" style="height: 100px" disabled></textarea></td>
                  </tr>
                  <tr class="border-b border-murky-600">
                    <th class="py-2">Tipe Target</th>
                    <td><?= $g['tipe_target'] ?></td>
                  </tr>
                  <tr class="border-b border-murky-600">
                    <th class="py-2">Validasi Status</th>
                    <td><?= $g['validasi_status'] ?></td>
                  </tr>
                  <tr class="border-b border-murky-600">
                    <th class="py-2">Validasi Kode</th>
                    <td><?= $g['validasi_kode'] ?></td>
                  </tr>
                  <tr class="border-b border-murky-600">
                    <th class="py-2">Tgl di buat</th>
                    <td><?= $g['created_at'] ?></td>
                  </tr>
                  <tr class="border-b border-murky-600">
                    <th class="py-2">Tgl di perbarui</th>
                    <td><?= $g['updated_at'] ?></td>
                  </tr>
              </table>
            </div>
            <div class="flex items-center justify-end p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="detail-modal<?= $g['id'] ?>" type="button" class="bg-red-700 inline-flex items-center py-2 px-3 justify-center text-sm text-white rounded-lg hover:bg-murky-700 focus:outline-none">Tutup</button>
            </div>
        </div>
    </div>
  </div>

  <!-- Modal Edit -->
  <div id="edit-modal<?= $g['id'] ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <div class="relative bg-murky-800 rounded-lg shadow">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-white">
                    Edit Games #<?= $g['nama'] ?>
                </h3>
                <button type="button" class="bg-murky-800 inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg hover:bg-murky-800 focus:outline-none" data-modal-hide="edit-modal<?= $g['id'] ?>">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5 space-y-4">
              <form action="<?= base_url('admin/games/update/' . $g['id']) ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                  <div class="mb-3">
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Games</label>
                    <input type="text" name="nama" class="custom-input block w-full" value="<?= $g['nama'] ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="sub_nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sub Nama Games</label>
                    <input type="text" name="sub_nama" class="custom-input block w-full" value="<?= $g['sub_nama'] ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand</label>
                    <input type="text" name="brand" class="custom-input block w-full" value="<?= $g['brand'] ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug / Url</label>
                    <input type="text" name="slug" class="custom-input block w-full" value="<?= $g['slug'] ?>" required>
                  </div>
                  <div>
                    <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                    <?php $last_select = $g['kategori']; ?>
                      <select class="custom-input block w-full" name="kategori" required>
                          <?php foreach ($kategori as $k): ?>
                              <option value="<?= $k['nama'] ?>" <?= ($k['nama'] == $last_select) ? 'selected' : '' ?>>
                                  <?= $k['nama'] ?>
                              </option>
                          <?php endforeach; ?>
                    </select>
                  </div>
                  <div>
                    <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipe Populer?</label>
                    <?php $last_select = $g['kategori']; ?>
                      <select class="custom-input block w-full" name="tipe" required>
                      <option value="Tidak" <?= ($g['tipe'] == 'Tidak') ? 'selected' : '' ?>>Tidak</option>
                          <option value="Populer" <?= ($g['tipe'] == 'Populer') ? 'selected' : '' ?>>Ya</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="informasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Informasi</label>
                    <textarea type="text" name="informasi" class="custom-input block w-full" required><?= $g['informasi'] ?></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="panduan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Panduan</label>
                    <textarea type="text" name="panduan" class="custom-input block w-full" required><?= $g['panduan'] ?></textarea>
                  </div>
                  <div>
                    <label for="tipe_target" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipe Target</label>
                      <select class="custom-input block w-full" name="tipe_target" required>
                      <option value="Id" <?= ($g['tipe_target'] == 'Id') ? 'selected' : '' ?>>ID</option>
                        <option value="Id-Server" <?= ($g['tipe_target'] == 'Id-Server') ? 'selected' : '' ?>>ID & Server</option>
                        <option value="genshin-impact" <?= ($g['tipe_target'] == 'genshin-impact') ? 'selected' : '' ?>>Genshin Impact</option>
                        <option value="Nomor" <?= ($g['tipe_target'] == 'Nomor') ? 'selected' : '' ?>>Nomor Hp</option>
                        <option value="Email"  <?= ($g['tipe_target'] == 'Email') ? 'selected' : '' ?>>Email</option>
                        <option value="PLN"  <?= ($g['tipe_target'] == 'PLN') ? 'selected' : '' ?>>PLN</option>
                    </select>
                  </div>
                  <div>
                    <label for="validasi Nickname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Validasi Nickname</label>
                      <select class="custom-input block w-full" name="validasi_status" required>
                      <option value="NO" <?= ($g['validasi_status'] == 'NO') ? 'selected' : '' ?>>No</option>
                        <option value="YA" <?= ($g['validasi_status'] == 'YA') ? 'selected' : '' ?>>Ya</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="validasi_kode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Validasi Kode</label>
                    <input type="text" name="validasi_kode" class="custom-input block w-full" value="<?= $g['validasi_kode'] ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="logo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Logo</label>
                    <input type="file" name="gambar" class="custom-input block w-full" value="<?= $g['gambar'] ?>">
                  </div>
                  <div class="mb-3">
                    <label for="banner" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Banner</label>
                    <input type="file" name="banner" class="custom-input block w-full" value="<?= $g['banner'] ?>">
                  </div>
                  
                <div class="flex items-center justify-end p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 me-2 text-center">Simpan</button>
                    <button data-modal-hide="edit-modal<?= $g['id'] ?>" type="button" class="bg-red-700 inline-flex items-center py-2 px-3 justify-center text-sm text-white rounded-lg hover:bg-murky-700 focus:outline-none">Tutup</button>
                </div>
              </form>
            </div>
        </div>
    </div>
  </div>

<!-- Modal Konfirmasi Hapus -->
<div id="hapus-modal<?= $g['id'] ?>" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-murky-800 rounded-lg shadow">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="hapus-modal<?= $g['id'] ?>">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-white">Apakah Anda yakin ingin menghapus data games ini?</h3>
                <button onclick="window.location.href='<?= base_url('admin/games/hapus/' . $g['id']) ?>'" type="button" class="text-white bg-red-600 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                    Hapus
                </button>
                <button data-modal-hide="hapus-modal<?= $g['id'] ?>" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-white focus:outline-none bg-murky-700 rounded-lg">Batal</button>
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