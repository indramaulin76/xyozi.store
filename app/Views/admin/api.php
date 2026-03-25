<?php $this->extend('admin/template'); ?>
<?php $this->section('content') ?>

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
  <p class="text-xl font-semibold text-left rtl:text-right text-gray-900 dark:text-white">Data Api Provider</p>
  <!--<div class="relative overflow-x-auto mt-4">
      <div class="mt-1">
          <input type="text" id="table-search" class="custom-input block w-full" placeholder="Search...">
      </div>
  </div>-->
  <div class="relative overflow-x-auto mt-4">
      <table class="w-full text-sm text-left rtl:text-right text-white" id="table">
          <thead class="whitespace-nowrap">
              <tr class="border-y border-murky-800 bg-murky-900 whitespace-nowrap">
                  <th scope="col" class="px-6 py-3">
                      No
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Provider
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Kode
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Api ID
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Api Key
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Private Key
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
                      Aksi
                  </th>
              </tr>
          </thead>
          <tbody>
              <?php foreach ($api as $index => $a): ?>
                  <tr class="whitespace-nowrap">
                      <td class="px-6 py-4">
                          <?= $index + 1 ?></td>
                      <td class="px-6 py-4">
                          <?= htmlspecialchars($a['provider'], ENT_QUOTES, 'UTF-8') ?>
                      </td>
                      <td class="px-6 py-4">
                          <?= htmlspecialchars($a['kode'], ENT_QUOTES, 'UTF-8') ?>
                      </td>
                      <td class="px-6 py-4">
                          <?= htmlspecialchars($a['api_id'], ENT_QUOTES, 'UTF-8') ?>
                      </td>
                      <td class="px-6 py-4">
                          <?= htmlspecialchars($a['api_key'], ENT_QUOTES, 'UTF-8') ?>
                      </td>
                      <td class="px-6 py-4">
                          <?= htmlspecialchars($a['private_key'], ENT_QUOTES, 'UTF-8') ?></td>
                      <td class="px-6 py-4">
                          <?= htmlspecialchars($a['profit'], ENT_QUOTES, 'UTF-8') ?>%</td>
                      <td class="px-6 py-4">
                          <?= htmlspecialchars($a['profit_basic'], ENT_QUOTES, 'UTF-8') ?>%</td>
                      <td class="px-6 py-4">
                          <?= htmlspecialchars($a['profit_gold'], ENT_QUOTES, 'UTF-8') ?>%</td>
                      <td class="px-6 py-4">
                          <?= htmlspecialchars($a['profit_platinum'], ENT_QUOTES, 'UTF-8') ?>%</td>
                      <td class="px-6 py-4">
        								<div class="flex">
        									<button type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 font-medium rounded-lg text-sm px-3 py-1 me-2" data-modal-target="edit-modal<?= $a['id'] ?>" data-modal-toggle="edit-modal<?= $a['id'] ?>">Edit</button>
        									<?php if ($a['kode'] == 'Vip') : ?>
        									<a href="<?= base_url('sistem/get-produkVip'); ?>?key=<?= urlencode($systemKey) ?>"><button type="button" class="focus:outline-none text-white bg-green-400 hover:bg-green-500 font-medium rounded-lg text-sm px-3 py-1 me-2">Get Produk</button></a>
        									<?php elseif ($a['kode'] == 'DF') : ?>
        									<a href="<?= base_url('sistem/get-produkDf'); ?>?key=<?= urlencode($systemKey) ?>"><button type="button" class="focus:outline-none text-white bg-green-400 hover:bg-green-500 font-medium rounded-lg text-sm px-3 py-1 me-2">Get Produk</button></a>
        									<?php elseif ($a['kode'] == 'RG') : ?>
        									<a href="<?= base_url('sistem/get-produkRG'); ?>?key=<?= urlencode($systemKey) ?>"><button type="button" class="focus:outline-none text-white bg-green-400 hover:bg-green-500 font-medium rounded-lg text-sm px-3 py-1 me-2">Get Produk</button></a>
        									<?php else : ?><?php endif; ?>
        								</div>		
        							</td>
                  </tr>
              <?php endforeach; ?>
          </tbody>
      </table>
      <!--<div class="flex justify-center mt-5 items-center">
          <div class="inline-flex" id="custom-paging">
              <button class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-murky-800 rounded-s hover:bg-murky-800 hover:text-white" id="prev-button">
                  Prev
              </button>
              <button class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-murky-800 rounded-s hover:bg-murky-800 hover:text-white" id="next-button">
                  Next
              </button>
          </div>
      </div>-->
  </div>
</section>

<?php foreach ($api as $key => $a): ?>
  <!-- Modal Edit -->
  <div id="edit-modal<?= $a['id'] ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <div class="relative bg-murky-800 rounded-lg shadow">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-white">
                    Edit Api Provider #<?= $a['provider'] ?>
                </h3>
                <button type="button" class="bg-murky-800 inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg hover:bg-murky-800 focus:outline-none" data-modal-hide="edit-modal<?= $a['id'] ?>">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5 space-y-4">
              <form action="<?= base_url('admin/api-provider/update/' . $a['id']) ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                  <div class="mb-3">
                    <label for="provider" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provider</label>
                    <input type="text" name="provider" class="custom-input block w-full" value="<?= $a['provider'] ?>" disabled>
                  </div>
                  <div class="mb-3">
                    <label for="kode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode</label>
                    <input type="text" name="kode" class="custom-input block w-full" value="<?= $a['kode'] ?>" disabled>
                  </div>
                  <?php if ($a['provider'] == "Tokopay") : ?>
                  <div class="mb-3">
                    <label for="api_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Merchant ID</label>
                    <input type="text" name="api_id" class="custom-input block w-full" value="<?= $a['api_id'] ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="api_key" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Secret Key</label>
                    <input type="text" name="api_key" class="custom-input block w-full" value="<?= $a['api_key'] ?>" required>
                  </div>
                  <!--<div class="mb-3">
                    <label for="private_key" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Private Key</label>
                    <input type="text" name="private_key" class="custom-input block w-full" value="<?= $a['private_key'] ?>" required>
                  </div>-->
                  <?php elseif ($a['provider'] == "Vip Reseller") : ?>
                  <div class="mb-3">
                    <label for="api_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Api ID</label>
                    <input type="text" name="api_id" class="custom-input block w-full" value="<?= $a['api_id'] ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="api_key" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Api Key</label>
                    <input type="text" name="api_key" class="custom-input block w-full" value="<?= $a['api_key'] ?>" required>
                  </div>
                  <!--<div class="mb-3">
                    <label for="private_key" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Private Key</label>
                    <input type="text" name="private_key" class="custom-input block w-full" value="<?= $a['private_key'] ?>" required>
                  </div>-->
                  
                  <div class="mb-3">
                    <label for="profit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profit</label>
                    <input type="text" name="profit" class="custom-input block w-full" value="<?= $a['profit'] ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="profit_basic" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profit Basic</label>
                    <input type="text" name="profit_basic" class="custom-input block w-full" value="<?= $a['profit_basic'] ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="profit_gold" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profit Gold</label>
                    <input type="text" name="profit_gold" class="custom-input block w-full" value="<?= $a['profit_gold'] ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="profit_platinum" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profit Platinum</label>
                    <input type="text" name="profit_platinum" class="custom-input block w-full" value="<?= $a['profit_platinum'] ?>" required>
                  </div>
                  <span class="text-sm text-red-500">Profit dalam bentuk % (persen)</span>
                  <?php elseif ($a['provider'] == "DigiFlazz") : ?> 
                  <div class="mb-3">
                    <label for="api_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                    <input type="text" name="api_id" class="custom-input block w-full" value="<?= $a['api_id'] ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="api_key" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Production Key</label>
                    <input type="text" name="api_key" class="custom-input block w-full" value="<?= $a['api_key'] ?>" required>
                  </div>
                  <!--<div class="mb-3">
                    <label for="private_key" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Private Key</label>
                    <input type="text" name="private_key" class="custom-input block w-full" value="<?= $a['private_key'] ?>" required>
                  </div>-->
                  
                  <div class="mb-3">
                    <label for="profit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profit</label>
                    <input type="text" name="profit" class="custom-input block w-full" value="<?= $a['profit'] ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="profit_basic" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profit Basic</label>
                    <input type="text" name="profit_basic" class="custom-input block w-full" value="<?= $a['profit_basic'] ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="profit_gold" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profit Gold</label>
                    <input type="text" name="profit_gold" class="custom-input block w-full" value="<?= $a['profit_gold'] ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="profit_platinum" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profit Platinum</label>
                    <input type="text" name="profit_platinum" class="custom-input block w-full" value="<?= $a['profit_platinum'] ?>" required>
                  </div>
                  <span class="text-sm text-red-500">Profit dalam bentuk % (persen)</span>
                  <?php elseif ($a['provider'] == "Fonnte") : ?>
                  <div class="mb-3">
                    <label for="api_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Api ID</label>
                    <input type="text" name="api_id" class="custom-input block w-full" value="<?= $a['api_id'] ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="api_key" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Api Key</label>
                    <input type="text" name="api_key" class="custom-input block w-full" value="<?= $a['api_key'] ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="private_key" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Private Key</label>
                    <input type="text" name="private_key" class="custom-input block w-full" value="<?= $a['private_key'] ?>" required>
                  </div>
                  <?php elseif ($a['provider'] == "Rgmoba") : ?>
                  <div class="mb-3">
                    <label for="api_key" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Api Key</label>
                    <input type="text" name="api_key" class="custom-input block w-full" value="<?= $a['api_key'] ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="profit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profit</label>
                    <input type="text" name="profit" class="custom-input block w-full" value="<?= $a['profit'] ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="profit_basic" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profit Basic</label>
                    <input type="text" name="profit_basic" class="custom-input block w-full" value="<?= $a['profit_basic'] ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="profit_gold" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profit Gold</label>
                    <input type="text" name="profit_gold" class="custom-input block w-full" value="<?= $a['profit_gold'] ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="profit_platinum" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profit Platinum</label>
                    <input type="text" name="profit_platinum" class="custom-input block w-full" value="<?= $a['profit_platinum'] ?>" required>
                  </div>
                  <span class="text-sm text-red-500">Profit dalam bentuk % (persen)</span>
                  <?php elseif ($a['provider'] == "Sakurupiah") : ?>
                  <div class="mb-3">
                    <label for="api_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Api ID</label>
                    <input type="text" name="api_id" class="custom-input block w-full" value="<?= $a['api_id'] ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="api_key" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Api Key</label>
                    <input type="text" name="api_key" class="custom-input block w-full" value="<?= $a['api_key'] ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="private_key" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Url Web Kamu <code style="color: #ff8282;">*https://example.com</code></label>
                    <input type="text" name="private_key" class="custom-input block w-full" value="<?= $a['private_key'] ?>" required>
                  </div>
                  <?php endif; ?>
                <div class="flex items-center justify-end p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 me-2 text-center">Simpan</button>
                    <button data-modal-hide="edit-modal<?= $a['id'] ?>" type="button" class="bg-red-700 inline-flex items-center py-2 px-3 justify-center text-sm text-white rounded-lg hover:bg-murky-700 focus:outline-none">Tutup</button>
                </div>
              </form>
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
</script>

<?= $this->endSection() ?>