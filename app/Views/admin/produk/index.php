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
  <p class="text-xl font-semibold text-left rtl:text-right text-gray-900 dark:text-white">Data Produk</p>
  <div class="relative overflow-x-auto mt-4">
      <div class="mt-1">
          <input type="text" id="table-search" class="custom-input block w-full" placeholder="Search...">
      </div>
  </div>
  <button type="button" class="bg-blue-500 text-white font-medium rounded-lg text-sm px-3 py-2 mt-3" data-modal-target="tambah-modal" data-modal-toggle="tambah-modal">
    Tambah Produk
  </button>
  <div class="relative overflow-x-auto mt-4">
      <table class="w-full text-sm text-left rtl:text-right text-white" id="produkTable">
          <thead class="whitespace-nowrap">
              <tr class="border-y border-murky-800 bg-murky-900 whitespace-nowrap">
                  <th scope="col" class="px-6 py-3">
                      No
                  </th>
                  <th scope="col" class="px-6 py-3">
                      ID
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Brand
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Nama
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Harga Provider
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Harga
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Harga Basic
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Harga Gold
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Harga Platinum
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Profit
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Profit Basic
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Profit Gold
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Profit Platinum
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Kode Produk
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Status
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Status Falsh Sale
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Provider
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Tgl Update
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Aksi
                  </th>
              </tr>
          </thead>
          <tbody class="text-center"></tbody>
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
                    Tambah Produk
                </h3>
                <button type="button" class="bg-murky-700 inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg hover:bg-murky-800 focus:outline-none" data-modal-hide="tambah-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5 space-y-4">
              <form action="<?= base_url('admin/produk/tambah') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                  <div class="mb-3">
                    <label for="nama" class="block mb-2 text-sm font-medium text-white">Nama Produk</label>
                    <input type="text" name="nama" class="custom-input block w-full" placeholder="Masukkan nama produk" required>
                  </div>
                  <div class="mb-3">
                    <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand</label>
                    <select class="custom-input block w-full" name="brand" required>
                      <?php foreach ($games as $g) : ?>
                      <option value="<?= $g['brand'] ?>"><?= $g['nama'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="harga_provider" class="block mb-2 text-sm font-medium text-white">Harga Provider</label>
                    <input type="number" name="harga_provider" class="custom-input block w-full" placeholder="Masukkan harga provider" required>
                  </div>
                  <div class="mb-3">
                    <label for="harga_jual" class="block mb-2 text-sm font-medium text-white">Harga</label>
                    <input type="number" name="harga_jual" class="custom-input block w-full" placeholder="Masukkan harga" required>
                  </div>
                  <div class="mb-3">
                    <label for="harga_basic" class="block mb-2 text-sm font-medium text-white">Harga Basic</label>
                    <input type="number" name="harga_basic" class="custom-input block w-full" placeholder="Masukkan harga basic" required>
                  </div>
                  <div class="mb-3">
                    <label for="harga_gold" class="block mb-2 text-sm font-medium text-white">Harga Gold</label>
                    <input type="number" name="harga_gold" class="custom-input block w-full" placeholder="Masukkan harga gold" required>
                  </div>
                  <div class="mb-3">
                    <label for="harga_platinum" class="block mb-2 text-sm font-medium text-white">Harga Platinum</label>
                    <input type="number" name="harga_platinum" class="custom-input block w-full" placeholder="Masukkan harga platinum" required>
                  </div>
                  <div class="mb-3">
                    <label for="profit" class="block mb-2 text-sm font-medium text-white">Profit</label>
                    <input type="number" name="keuntungan" class="custom-input block w-full" placeholder="Masukkan profit" required>
                  </div>
                  <div class="mb-3">
                    <label for="profit_basic" class="block mb-2 text-sm font-medium text-white">Profit Basic</label>
                    <input type="number" name="keuntungan_basic" class="custom-input block w-full" placeholder="Masukkan profit basic" required>
                  </div>
                  <div class="mb-3">
                    <label for="profit_gold" class="block mb-2 text-sm font-medium text-white">Profit Gold</label>
                    <input type="number" name="keuntungan_gold" class="custom-input block w-full" placeholder="Masukkan profit gold" required>
                  </div>
                  <div class="mb-3">
                    <label for="profit_platinum" class="block mb-2 text-sm font-medium text-white">Profit Platinum</label>
                    <input type="number" name="keuntungan_platinum" class="custom-input block w-full" placeholder="Masukkan profit platinum" required>
                  </div>
                  <div class="mb-3">
                    <label for="kode_produk" class="block mb-2 text-sm font-medium text-white">Kode Produk</label>
                    <input type="text" name="kode_produk" class="custom-input block w-full" placeholder="Masukkan kode produk" required>
                  </div>
                  <div class="mb-3">
                    <label for="tipe" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipe</label>
                    <select class="custom-input block w-full" name="tipe" required>
                      <option value="instant">Top Up Instant</option>
                      <option value="special">Special Items</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                    <select class="custom-input block w-full" name="status" required>
                      <option value="aktif">Aktif</option>
                      <option value="tidak aktif">Tidak Aktif</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="provider" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provider</label>
                    <select class="custom-input block w-full" name="provider" required>
                      <option value="Vip">Vip Reseller</option>
                      <option value="DF">DigiFlazz</option>
                      <option value="AG">Api Games</option>
                      <option value="Manual">Manual</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="logo" class="block mb-2 text-sm font-medium text-white">Logo</label>
                    <input type="file" name="logo" class="custom-input block w-full">
                  </div>
                  <!-- Flash Sale -->
                  <div class="flex items-start mb-3 mt-5">
                    <div class="flex items-center h-5">
                      <input id="falshsale" type="checkbox" name="sts_flash_sale" value="No" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800"/>
                    </div>
                    <label for="sts_flash_sale" class="block ms-3 text-sm font-medium text-gray-900 dark:text-white">Flash Sale ?</label>
                  </div>
                  <div class="mb-3 flash-sale-input">
                    <label for="persen_diskon" class="block mb-2 text-sm font-medium text-white">Persen Diskon</label>
                    <input type="number" name="persen_diskon" class="custom-input block w-full" placeholder="cth : 20">
                  </div>
                  <div class="mb-3 flash-sale-input">
                    <label for="harga_fs" class="block mb-2 text-sm font-medium text-white">Harga Flash Sale</label>
                    <input type="number" name="harga_fs" class="custom-input block w-full" readonly>
                  </div>
                  <div class="mb-3 flash-sale-input">
                    <label for="harga_fs_basic" class="block mb-2 text-sm font-medium text-white">Harga Flash Sale Basic</label>
                    <input type="number" name="harga_fs_basic" class="custom-input block w-full" readonly>
                  </div>
                  <div class="mb-3 flash-sale-input">
                    <label for="harga_fs_gold" class="block mb-2 text-sm font-medium text-white">Harga Flash Sale Gold</label>
                    <input type="number" name="harga_fs_gold" class="custom-input block w-full" readonly>
                  </div>
                  <div class="mb-3 flash-sale-input">
                    <label for="harga_fs_platinum" class="block mb-2 text-sm font-medium text-white">Harga Flash Sale Platinum</label>
                    <input type="number" name="harga_fs_platinum" class="custom-input block w-full" readonly>
                  </div>
                  <div class="mb-3 flash-sale-input">
                    <label for="waktu_akhir_fs" class="block mb-2 text-sm font-medium text-white">Waktu Akhir Flash Sale</label>
                    <input type="datetime-local" name="waktu_akhir_fs" class="custom-input block w-full">
                  </div>
                  <!-- End Flash Sale -->
                  
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
$(document).ready(function () {
    var table = $('#produkTable').DataTable({
        "processing": true,
        "serverSide": true,
        "pageLength": 10,
        "lengthChange": false,
        "dom": 'rtip',
        "pagingType": 'simple',
        "ajax": {
            "url": "<?php echo base_url('admin/produk/getProduk'); ?>",
            "type": "POST"
        },
        "columns": [
            {"data": null, "render": function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }},
            {"data": "id"},
            {"data": "brand"},
            {"data": "nama"},
            {"data": "harga_provider", "render": function (data, type, row) {
                return formatRupiah(data);
            }},
            {"data": "harga_jual", "render": function (data, type, row) {
                return formatRupiah(data);
            }},
            {"data": "harga_basic", "render": function (data, type, row) {
                return formatRupiah(data);
            }},
            {"data": "harga_gold", "render": function (data, type, row) {
                return formatRupiah(data);
            }},
            {"data": "harga_platinum", "render": function (data, type, row) {
                return formatRupiah(data);
            }},
            {"data": "keuntungan", "render": function (data, type, row) {
                return formatRupiah(data);
            }},
            {"data": "keuntungan_basic", "render": function (data, type, row) {
                return formatRupiah(data);
            }},
            {"data": "keuntungan_gold", "render": function (data, type, row) {
                return formatRupiah(data);
            }},
            {"data": "keuntungan_platinum", "render": function (data, type, row) {
                return formatRupiah(data);
            }},
            {"data": "kode_produk"},
            {"data": "status"},
            {"data": "sts_flash_sale"},
            {"data": "provider"},
            {"data": "updated_at"},
            {"data": null, "render": function (data, type, row) {
                return '<div class="flex"><a href="<?= base_url('admin/produk/edit/') ?>' + row.id + '" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 font-medium rounded-lg text-sm px-3 py-1 me-2">Edit</a>' +
                    '<a href="<?= base_url('admin/produk/hapus/') ?>' + row.id + '" type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm px-3 py-1 me-2" data-id="' + row.id + '">Hapus</a></div>';
            }}
        ]
        
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
    
    function formatRupiah(angka) {
        var reverse = angka.toString().split('').reverse().join(''),
            ribuan = reverse.match(/\d{1,3}/g);
        ribuan = ribuan.join('.').split('').reverse().join('');
        return 'Rp ' + ribuan;
    }
});

// Flash Sale
document.addEventListener('DOMContentLoaded', function() {
    const checkbox = document.getElementById('flashsale');
    const hiddenInput = document.querySelector('input[name="sts_flash_sale"]');
    
    checkbox.addEventListener('change', function() {
        if (this.checked) {
            hiddenInput.value = 'Ya';
        } else {
            hiddenInput.value = 'No';
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
  const checkbox = document.getElementById('falshsale');
  const flashSaleInputs = document.querySelectorAll('.flash-sale-input');

  flashSaleInputs.forEach(input => {
    input.style.display = 'none';
  });

  checkbox.addEventListener('change', function() {
    if (this.checked) {
      flashSaleInputs.forEach(input => {
        input.style.display = 'block';
        input.removeAttribute('disabled');
      });
    } else {
      flashSaleInputs.forEach(input => {
        input.style.display = 'none';
        input.setAttribute('disabled', true);
      });
    }
  });
});

// Hasil Harga Flash Sale
document.addEventListener('DOMContentLoaded', function() {
    const hargaJualInput = document.querySelector('input[name="harga_jual"]');
    const hargaBasicInput = document.querySelector('input[name="harga_basic"]');
    const hargaGoldInput = document.querySelector('input[name="harga_gold"]');
    const hargaPlatinumInput = document.querySelector('input[name="harga_platinum"]');
    const persenDiskonInput = document.querySelector('input[name="persen_diskon"]');
    
    const hargaFsInput = document.querySelector('input[name="harga_fs"]');
    const hargaFsBasicInput = document.querySelector('input[name="harga_fs_basic"]');
    const hargaFsGoldInput = document.querySelector('input[name="harga_fs_gold"]');
    const hargaFsPlatinumInput = document.querySelector('input[name="harga_fs_platinum"]');
    
    function updateHargaFs() {
        const hargaJual = parseFloat(hargaJualInput.value);
        const persenDiskon = parseFloat(persenDiskonInput.value);
        
        if (!isNaN(hargaJual) && !isNaN(persenDiskon)) {
            const diskon = (persenDiskon / 100) * hargaJual;
            const hargaSetelahDiskon = hargaJual - diskon;
            
            hargaFsInput.value = parseInt(hargaSetelahDiskon);
        }
    }
    
    function updateHargaFsByType(input, hargaFsInput) {
        const harga = parseFloat(input.value);
        const persenDiskon = parseFloat(persenDiskonInput.value);
        
        if (!isNaN(harga) && !isNaN(persenDiskon)) {
            const diskon = (persenDiskon / 100);
            const hargaFs = harga * (1 - diskon);
            hargaFsInput.value = parseInt(hargaFs);
        }
    }
    
    hargaJualInput.addEventListener('input', updateHargaFs);
    hargaBasicInput.addEventListener('input', function() {
        updateHargaFsByType(this, hargaFsBasicInput);
    });
    hargaGoldInput.addEventListener('input', function() {
        updateHargaFsByType(this, hargaFsGoldInput);
    });
    hargaPlatinumInput.addEventListener('input', function() {
        updateHargaFsByType(this, hargaFsPlatinumInput);
    });
    persenDiskonInput.addEventListener('input', function() {
        updateHargaFs();
        updateHargaFsByType(hargaBasicInput, hargaFsBasicInput);
        updateHargaFsByType(hargaGoldInput, hargaFsGoldInput);
        updateHargaFsByType(hargaPlatinumInput, hargaFsPlatinumInput);
    });
});

</script>

<?= $this->endSection(); ?>