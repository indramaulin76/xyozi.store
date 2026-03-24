<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<style>
.dataTables_info {
    display: none;
}
</style>

<section class="bg-murky-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-16">
      <div class="flex flex-col gap-3 w-full max-w-screen-xl">
          <p class="text-2xl font-semibold text-left rtl:text-right text-gray-900 dark:text-white">Riwayat Transaksi</p>
          <div class="relative max-w-screen-md">
              <div class="mt-1">
                  <input type="text" id="table-search" class="pt-2 custom-input block w-full" placeholder="Search...">
              </div>
          </div>
          <div class="relative overflow-x-auto">
              <table class="w-full text-sm text-left rtl:text-right text-white" id="history">
                  <thead class="text-xs text-white whitespace-nowrap">
                      <tr class="border-y border-murky-800 bg-murky-900 whitespace-nowrap">
                          <th scope="col" class="px-6 py-3">
                              #
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Nomor Invoice
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Games
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Item
                          </th>
                          <th scope="col" class="px-6 py-3">
                              User Input
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Harga
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Pesan
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Tanggal
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Status
                          </th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($transaksi as $key => $t): ?>
                          <tr class="border-y border-murky-800 bg-murky-900 whitespace-nowrap">
                              <td class="px-6 py-4">
                                  <?= $key + 1 ?>
                              </td>
                              <td class="px-6 py-4">
                                <a href="<?= base_url('invoice/' . $t['order_id']) ?>" class="x-color-g">
                                  <?= $t['order_id'] ?>
                                </a>
                              </td>
                              <td class="px-6 py-4">
                                  <?= $t['games'] ?>
                              </td>
                              <td class="px-6 py-4">
                                  <?= $t['produk'] ?>
                              </td>
                              <td class="px-6 py-4">
                                  <?= esc($t['uid']); ?>
                                  <?php if ($t['server'] !== "NoServer") : ?>
                                      <?= ' ' . esc($t['server']); ?>
                                  <?php endif; ?>
                              </td>
                              <td class="px-6 py-4">
                                  <?= "Rp " . number_format($t['harga_jual'], 0, ',', '.') ?>
                              </td>
                              <td class="px-6 py-4">
                                  <?= $t['note'] ?>
                              </td>
                              <td class="px-6 py-4">
                                  <?= $t['created_at'] ?>
                              </td>
                              <td class="px-6 py-4">
                                <?php if ($t['status_pembelian'] == 'success' || $t['status_pembelian'] == 'sukses'): ?>
                                <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300"><?= $t['status_pembelian'] ?></span>
                                  <?php elseif ($t['status_pembelian'] == 'Proses'): ?>
                                  <span class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300"><?= $t['status_pembelian'] ?></span>
                                  <?php elseif ($t['status_pembelian'] == 'Pending'): ?>
                                  <span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300"><?= $t['status_pembelian'] ?></span>
                                  <?php else: ?>
                                  <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300"><?= $t['status_pembelian'] ?></span>
                                  <?php endif; ?>
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
      </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        var table = $('#history').DataTable({
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