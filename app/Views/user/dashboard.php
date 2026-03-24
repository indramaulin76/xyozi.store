<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<style>
.dataTables_info {
    display: none;
}
</style>

<div class="flex flex-col gap-3 w-full max-w-screen-xl mt-4 p-3">
  <div class="grid md:grid-cols-2 gap-4 items-center">
    <div class="mt-3 md:mt-0">
       <div class="flow-root bg-murky-800 rounded-lg shadow sm:p-8 p-5">
          <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-600">
            <li class="py-3 sm:py-4">
              <div class="flex items-center">
                <div class="x-bg-g rounded-full px-5 py-4">
                  <i class="fa-solid fa-user text-white text-2xl"></i>
                </div>
                <div class="flex-1 min-w-0 ms-4">
                  <p class="text-xl font-medium text-gray-900 truncate dark:text-white"><?= $user['username'] ?></p>
                  <div class="bg-blue-100 hover:bg-blue-200 text-blue-800 text-xs font-semibold me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400 inline-flex items-center justify-center"><?= $user['role'] ?></div>
                </div>
                <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                  <a href="<?= base_url('dashboard/akun') ?>" type="button" class="text-center bg-murky-700 text-white hover:bg-murky-700 focus:outline-none rounded-lg text-sm p-2.5 w-10 h-10">
                    <i class="fa-solid fa-gear w-5 h-5"></i>
                  </a>
                </div>
              </div>
            </li>
            <li class="py-3 sm:py-4">
              <div class="flex items-center">
                <div class="flex-1 min-w-0 ms-4">
                  <p class="text-xl font-medium text-gray-900 truncate dark:text-white"><?= 'Rp ' . number_format($user['balance'], 0, ',', '.') ?></p>
                </div>
                <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                  <a href="<?= base_url('dashboard/topup') ?>" type="button" class="text-center x-bg-g text-white focus:outline-none rounded-lg text-sm p-2.5">
                    Top Up
                  </a>
                </div>
              </div>
            </li>
          </ul>
       </li>
      </div>
    </div>
    
    <div class="mt-5">
      <p class="text-xl font-semibold text-left rtl:text-right text-gray-900 dark:text-white">Transaksi Hari Ini</p>
      <div class="bg-murky-700 rounded-lg shadow mt-4">
        <div class="flex flex-col items-center py-5">
            <h5 class="mb-1 text-4xl font-medium text-gray-900 dark:text-white"><?= $totalTransaksiNew ?></h5>
            <span class="text-sm text-gray-900 dark:text-white">Total Transaksi</span>
        </div>
      </div>
      <div class="grid grid-cols-2 gap-3 mt-4">
        <div class="bg-yellow-400 rounded-lg shadow">
          <div class="flex flex-col items-center py-5">
              <h5 class="mb-1 text-4xl font-medium text-white"><?= $totalTrxPendingNew ?></h5>
              <span class="text-sm text-white">Menunggu</span>
          </div>
        </div>
        <div class="bg-blue-500 rounded-lg shadow">
          <div class="flex flex-col items-center py-5">
              <h5 class="mb-1 text-4xl font-medium text-white"><?= $totalTrxProsesNew ?></h5>
              <span class="text-sm text-white">Dalam Proses</span>
          </div>
        </div>
        <div class="bg-green-400 rounded-lg shadow">
          <div class="flex flex-col items-center py-5">
              <h5 class="mb-1 text-4xl font-medium text-white"><?= $totalTrxSuksesNew ?></h5>
              <span class="text-sm text-white">Sukses</span>
          </div>
        </div>
        <div class="bg-red-500 rounded-lg shadow">
          <div class="flex flex-col items-center py-5">
              <h5 class="mb-1 text-4xl font-medium text-white"><?= $totalTrxGagalNew ?></h5>
              <span class="text-sm text-white">Gagal</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="mt-5">
    <p class="text-xl font-semibold text-left rtl:text-right text-gray-900 dark:text-white">Riwayat Transaksi Terbaru Hari Ini</p>
    <div class="relative overflow-x-auto mt-4">
        <div class="mt-1">
            <input type="text" id="table-search" class="custom-input block w-full" placeholder="Search...">
        </div>
    </div>
    <div class="relative overflow-x-auto mt-4">
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
                <?php foreach ($newTransaksi as $key => $t): ?>
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
                          <?php if ($t['status_pembelian'] == 'success' || $t['status_pembelian'] == 'Sukses'): ?>
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
    </div>
  </div>
</div>

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
<?php endif; ?>
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