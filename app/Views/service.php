<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<style>
  .card img {
    height: 150px;
    width: 110px;
    object-fit: cover;
    margin-right: 12px;
    border-radius: 14px;
    --tw-bg-opacity: 1;
    background-color: rgb(52 55 59/var(--tw-bg-opacity));
  }
</style>

<section class="bg-murky-900">
  <div class="px-4 py-8">
    <div class="max-w-md">
      <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">Daftar Produk</h1>
      <p class="mb-6 font-light text-gray-300 text-sm">Berikut ini adalah halaman untuk melihat daftar harga semua produk kami. Silahkan pilih produk untuk melihat daftar harga</p>
    </div>
    <div class="flex flex-col items-center">
      <div class="flex flex-col gap-3 w-full max-w-screen-xl">
        <div class="w-full max-w-md mb-3">
          <label for="selectedGame" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Kategori</label>
          <select id="selectedGame" class="custom-input block w-full">
            <?php foreach ($games as $g) : ?>
              <option value="<?= $g['brand'] ?>"><?= $g['nama'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="flex overflow-x-auto">
        <?php foreach ($games as $g) : ?>
            <div class="card relative flex-shrink-0 mr-4" data-brand="<?= $g['brand'] ?>">
                <img class="object-cover" src="<?= base_url(); ?>public/img/games/<?= $g['gambar'] ?>" alt="<?= $g['nama'] ?>" loading="lazy">
            </div>
        <?php endforeach; ?>
        </div>
        <div class="overflow-x-auto overflow-hidden max-w-full my-6">
              <table class="w-full text-sm text-left rtl:text-right text-white" id="table">
                  <thead class="text-xs text-white uppercase whitespace-nowrap">
                      <tr class="bg-murky-800 whitespace-nowrap">
                          <th scope="col" class="px-6 py-3">
                              ID
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Games
                          </th>
                          <th scope="col" class="px-6 py-3">
                              LAYANAN
                          </th>
                          <th scope="col" class="px-6 py-3">
                              HARGA
                          </th>
                          <th scope="col" class="px-6 py-3">
                              HARGA BASIC
                          </th>
                          <th scope="col" class="px-6 py-3">
                              HARGA GOLD
                          </th>
                          <th scope="col" class="px-6 py-3">
                              HARGA PLATINUM
                          </th>
                          <th scope="col" class="px-6 py-3">
                              STATUS
                          </th>
                      </tr>
                  </thead>
                  <tbody></tbody>
              </table>
          </div>
      </div>
    </div>
  </div>
</section>

<script>
$(document).ready(function(){
    function loadMyService(brand) {
        $.ajax({
            url: "<?php echo base_url('getMyService'); ?>",
            type: "GET",
            data: { brand: brand },
            dataType: "json",
            success: function(data) {
                if (data.length === 0) {
                    var noDataMessage = '<tr><td colspan="7" class="py-24 px-4 text-center sm:px-6">' +
                        '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="mx-auto h-12 w-12 text-white">' +
                        '<path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"></path></svg>' +
                        '<h3 class="mt-2 font-semibold text-white">Data tidak ditemukan!</h3>' +
                        '<p class="mt-1 text-sm text-murky-300">Tidak ada aktivitas data.</p>' +
                        '</td></tr>';
                    $('tbody').html(noDataMessage);
                } else {
                    var rows = '';
                    $.each(data, function(index, service) {
                        rows += '<tr class="border-y border-murky-800 bg-murky-900 whitespace-nowrap">';
                        rows += '<td class="px-6 py-3">' + service.id + '</td>';
                        rows += '<td class="px-6 py-3">' + service.brand + '</td>';
                        rows += '<td class="px-6 py-3">' + service.nama + '</td>';
                        rows += '<td class="px-6 py-3">' + formatRupiah(service.harga_jual) + '</td>';
                        rows += '<td class="px-6 py-3">' + formatRupiah(service.harga_basic) + '</td>';
                        rows += '<td class="px-6 py-3">' + formatRupiah(service.harga_gold) + '</td>';
                        rows += '<td class="px-6 py-3">' + formatRupiah(service.harga_platinum) + '</td>';
                        rows += '<td class="px-6 py-3">';
                        if (service.status == 'aktif') {
                            rows += '<span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">' + service.status + '</span>';
                        } else {
                            rows += '<span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">' + service.status + '</span>';
                        }
                        rows += '</td></tr>';
                    });
                    $('tbody').html(rows);
                }
            }
        });
    }
    
    var selectedGame = false;
    $('#selectedGame').on('change', function() {
        selectedGame = true;
        var brand = $(this).val();
        loadMyService(brand);
    });
    
    if (!selectedGame) {
        var firstGameBrand = $('#selectedGame').val();
        loadMyService(firstGameBrand);
    }

    $('.card').on('click', function() {
        var brand = $(this).data('brand');
        loadMyService(brand);
    });

    function formatRupiah(angka) {
        var number_string = angka.toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return 'Rp ' + rupiah;
    }
});
</script>

<?= $this->endSection() ?>