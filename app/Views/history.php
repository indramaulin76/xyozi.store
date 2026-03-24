<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<section class="bg-murky-900">
    <div class="flex flex-col justify-center px-3 py-8 mx-auto md:h-screen lg:py-16">
      <div class="flex flex-col gap-3 w-full max-w-screen-md">
          <div class="">
            <h1 class="text-3xl text-white font-extrabold tracking-tight leading-none mb-3">Cari Transaksi</h1>
            <p class="text-md text-gray-500 dark:text-gray-300">Lacak transaksi kamu dengan cara memasukkan Nomor Invoice dibawah ini:</p>
            <div class="py-3">
                <label for="invoice" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Invoice</label>
                <input type="text" id="orderNumberInput" class="custom-input block w-full" placeholder="Masukkan nomor invoice anda" required>
            </div>
            <button onclick="cariPesanan()" type="button" class="flex text-white x-bg-g font-medium rounded-lg text-sm max-w-fit px-4 py-2 gap-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="h-5 w-5">
                <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd"></path>
              </svg>
              Cari Transaksi
            </button>
          </div>
      </div>
    </div>
</section>
<section>
  <div class="px-3">
    <p class="text-xl font-semibold text-left text-white mb-2">Transaksi Real-time</p>
    <p class="mb-6 font-light text-gray-300 text-sm">Berikut ini real-time data pesanan masuk terbaru <?= $web['web_title'] ?>.</p>
  </div>
  <div class="relative overflow-x-auto max-w-full">
      <table class="w-full text-sm text-left rtl:text-right text-white" id="transaction-table">
          <thead class="text-xs text-white uppercase whitespace-nowrap">
              <tr class="border-y border-murky-800 bg-murky-900 whitespace-nowrap">
                  <th scope="col" class="px-6 py-3">
                      #
                  </th>
                  <th scope="col" class="px-6 py-3">
                      INVOICE
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Games
                  </th>
                  <th scope="col" class="px-6 py-3">
                      LAYANAN
                  </th>
                  <th scope="col" class="px-6 py-3">
                      TANGGAL
                  </th>
                  <th scope="col" class="px-6 py-3">
                      STATUS
                  </th>
              </tr>
          </thead>
          <tbody></tbody>
      </table>
  </div>
</section>

<script>
function numberFormat(number, decimals, decimalSeparator, thousandsSeparator) {
    decimals = isNaN(decimals) ? 0 : Math.abs(decimals);
    decimalSeparator = decimalSeparator || '.';
    thousandsSeparator = thousandsSeparator || ',';

    const roundedNumber = Math.pow(10, decimals) * number;
    const roundedInteger = Math.round(roundedNumber);
    const formattedNumber = roundedInteger / Math.pow(10, decimals);

    const parts = formattedNumber.toFixed(decimals).split('.');
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousandsSeparator);

    return parts.join(decimalSeparator);
}

var notyf = new Notyf({
  duration: 4000,
  position: {
    x: 'right',
    y: 'top',
  },
});

function cariPesanan() {
    const orderNumberInput = document.getElementById('orderNumberInput');
    const orderNumber = orderNumberInput.value.trim();

    if (orderNumber === '') {
        notyf.error('Masukkan nomor invoice untuk melihat detail pesanan anda');
        return;
    }

    fetch('<?= base_url('order/getOrderDetails') ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            order_id: orderNumber,
        }),
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = `<?= base_url('invoice/') ?>${orderNumber}`;
        } else {
            notyf.error('Nomor pesanan yang anda masukkan tidak ditemukan');
        }
    })
    .catch(error => {
        notyf.error('Terjadi kesalahan saat mengambil data pesanan');
    });
}

$(document).ready(function(){
    function loadLatestTransactions() {
        $.ajax({
            url: "<?php echo base_url('cari-pesanan/getLatestTransactions'); ?>",
            type: "GET",
            dataType: "json",
            success: function(data) {
                var rows = '';
                $.each(data, function(index, transaction) {
                    var lastOrderId = transaction.order_id.slice(-2);
                    
                    var formattedOrderId = transaction.order_id.substring(0, 3) + '*******' + lastOrderId;

                    rows += '<tr class="border-y border-murky-800 bg-murky-900 whitespace-nowrap">';
                    rows += '<td class="px-6 py-4">' + (index + 1) + '</td>';
                    rows += '<td class="px-6 py-4">' + formattedOrderId + '</td>';
                    rows += '<td class="px-6 py-4">' + transaction.games + '</td>';
                    rows += '<td class="px-6 py-4">' + transaction.produk + '</td>';
                    rows += '<td class="px-6 py-4">' + transaction.created_at + '</td>';
                    rows += '<td class="px-6 py-4">';
                    if (transaction.status_pembelian == 'Sukses') {
                        rows += '<span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">' + transaction.status_pembelian + '</span>';
                    } else if (transaction.status_pembelian == 'Proses') {
                        rows += '<span class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">' + transaction.status_pembelian + '</span>';
                    } else if (transaction.status_pembelian == 'Pending') {
                        rows += '<span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">' + transaction.status_pembelian + '</span>';
                    } else {
                        rows += '<span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">' + transaction.status_pembelian + '</span>';
                    }
                    rows += '</td></tr>';
                });
                $('tbody').html(rows);
            }
        });
    }
    
    loadLatestTransactions();
    
    setInterval(loadLatestTransactions, 10000);
});
</script>

<?= $this->endSection() ?>