<?php $this->extend('admin/template'); ?>
<?= $this->section('content') ?>

<section class="bg-murky-900 mb-8">
  <?php if (session()->getFlashdata('success')) : ?>
    <div class="p-4 mb-4 text-sm text-green-400 rounded-lg bg-murky-800" role="alert">
      <span class="font-medium">Sukses!</span> <?= esc(session()->getFlashdata('success')) ?>
    </div>
  <?php endif; ?>
  <?php if (session()->getFlashdata('error')) : ?>
    <div class="p-4 mb-4 text-sm text-red-400 rounded-lg bg-murky-800" role="alert">
      <span class="font-medium">Gagal!</span> <?= esc(session()->getFlashdata('error')) ?>
    </div>
  <?php endif; ?>
  <?php if (session()->getFlashdata('info')) : ?>
    <div class="p-4 mb-4 text-sm text-yellow-300 rounded-lg bg-murky-800" role="alert">
      <span class="font-medium">Warning!</span> <?= esc(session()->getFlashdata('info')) ?>
    </div>
  <?php endif; ?>
  <p class="text-xl font-semibold text-left rtl:text-right text-gray-900 dark:text-white">Data User</p>
  <div class="relative overflow-x-auto mt-4">
      <div class="mt-1">
          <input type="text" id="table-search" class="custom-input block w-full" placeholder="Search...">
      </div>
  </div>
  <div class="relative overflow-x-auto mt-4">
      <table class="w-full text-sm text-left rtl:text-right text-white" id="table">
          <thead class="whitespace-nowrap">
              <tr class="border-y border-murky-800 bg-murky-900 whitespace-nowrap">
                  <th scope="col" class="px-6 py-3">
                      No
                  </th>
                  <th scope="col" class="px-6 py-3">
                      User ID
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Nama
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Username
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Email
                  </th>
                  <th scope="col" class="px-6 py-3">
                      WhatsApp
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Saldo
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Level
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Tgl Bergabung
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

<script>
$(document).ready(function () {
    var table = $('#table').DataTable({
        "processing": true,
        "serverSide": true,
        "pageLength": 10,
        "lengthChange": false,
        "dom": 'rtip',
        "pagingType": 'simple',
        "ajax": {
            "url": "<?php echo base_url('admin/user/getUser'); ?>",
            "type": "POST"
        },
        "columns": [
            {"data": null, "render": function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }},
            {"data": "id", "render": function (data, type, row) {
                return data;
            }},
            {"data": "nama", "render": function (data, type, row) {
                return htmlspecialchars(data);
            }},
            {"data": "username", "render": function (data, type, row) {
                return htmlspecialchars(data);
            }},
            {"data": "email", "render": function (data, type, row) {
                return htmlspecialchars(data);
            }},
            {"data": "whatsapp", "render": function (data, type, row) {
                return htmlspecialchars(data);
            }},
            {"data": "balance", "render": function (data, type, row) {
                return formatRupiah(data);
            }},
            {"data": "role", "render": function (data, type, row) {
                return data;
            }},
            {"data": "date_create", "render": function (data, type, row) {
                return data;
            }},
            {"data": null, "render": function (data, type, row) {
                return '<div class="flex"><a href="<?= base_url('admin/user/edit/') ?>' + row.id + '" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 font-medium rounded-lg text-sm px-3 py-1 me-2">Edit</a>' +
                    '<a href="<?= base_url('admin/user/hapus/') ?>' + row.id + '" type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm px-3 py-1 me-2" data-id="' + row.id + '">Hapus</a></div>';
            }}
        ]
    });

    $('.dataTables_paginate').hide();
      
    $('#table-search').on('keyup', function() {
        var searchTerm = $('<div>').text(this.value).html();
        table.search(searchTerm).draw();
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
    
    function htmlspecialchars(str) {
    if (typeof str === "string") {
        return str.replace(/&/g, "&amp;")
                  .replace(/</g, "&lt;")
                  .replace(/>/g, "&gt;")
                  .replace(/"/g, "&quot;")
                  .replace(/'/g, "&#039;");
    }
    return str;
    }
});
</script>

<?= $this->endSection(); ?>