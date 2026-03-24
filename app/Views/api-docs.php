<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<section class="bg-murky-900">
    <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
        <div class="mr-auto place-self-center lg:col-span-7">
            <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">Dokumentasi</h1>
            <p class="max-w-2xl mb-6 font-light lg:mb-8 md:text-lg lg:text-xl text-gray-300">Untuk anda yang sudah mempunyai web topup game, anda dapat menghubungkan website topup game anda menggunakan Open API dari <?= $web['web_title'] ?>.</p>
        </div>
        <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
            <img src="<?= base_url(); ?>public/img/vector/api.svg" alt="Xosgames.com">
        </div>                
    </div>
</section>

<section class="bg-murky-900 px-3 py-2">
  <div class="w-full mt-4 p-4 bg-murky-800 rounded-lg shadow">
    <h5 class="mb-2 text-3xl font-semibold tracking-tight text-white">Profile</h5>
    <p class="mb-6 font-light text-sm text-gray-300">Mendapatkan data profile</p>
    <div class="mb-3 flex flex-wrap">
      <span class="text-xs font-medium me-2 px-2.5 py-0.5 rounded bg-red-900 text-red-300">[ POST ]</span>
    </div>
    <div class="mb-8 flex flex-wrap">
      <span class="text-sm font-medium me-2 px-2.5 py-0.5 rounded bg-murky-600 text-gray-100"><?= base_url('api/profile') ?></span>
    </div>
    <div class="relative overflow-x-auto mb-8">
        <table class="w-full text-sm text-left rtl:text-right text-white">
            <thead class="text-xs text-white uppercase bg-murky-700 border-b border-murky-800">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Parameter
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Keterangan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Req
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-murky-600 border-b border-murky-800">
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                        api_id
                    </th>
                    <td class="px-6 py-4">
                      Berisi Api ID Anda
                    </td>
                    <td class="px-6 py-4">
                        Ya
                    </td>
                </tr>
                <tr class="bg-murky-600 border-b border-murky-800">
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                        api_key
                    </th>
                    <td class="px-6 py-4">
                        Berisi Api Key Anda
                    </td>
                    <td class="px-6 py-4">
                        Ya
                    </td>
                </tr>
                <tr class="bg-murky-600 border-b border-murky-800">
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                        signature
                    </th>
                    <td class="px-6 py-4">
                        Berisi formula md5(API ID + API KEY) Anda
                    </td>
                    <td class="px-6 py-4">
                        Ya
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <h5 class="mb-4 text-sm font-semibold tracking-tight text-white">Contoh Respon Yang Ditampilkan</h5>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-white">
            <thead class="text-xs text-white uppercase bg-murky-700 border-b border-murky-800">
                <tr class="whitespace-nowrap">
                    <th scope="col" class="px-6 py-3 text-green-400">
                        Resppon Sukses
                    </th>
                    <th scope="col" class="px-6 py-3 text-red-500">
                        Resppon Gagal
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-murky-600 border-b border-murky-800">
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white text-left">
<pre><code>{
  "result": true,
  "msg": "berhasil mendapatkan data profile",
  "data": {
      "username": "Xosgames",
      "balance": 0,
      "role": "Basic"
  }
}
</code></pre>
                    </th>
                    <td class="px-6 py-4">
<pre><code>{
  "result": false,
  "msg": "API ID atau API KEY tidak ditemukan",
}
</code></pre>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
  </div>
</section>

<section class="bg-murky-900 px-3 py-2">
  <div class="w-full mt-4 p-4 bg-murky-800 rounded-lg shadow">
    <h5 class="mb-2 text-3xl font-semibold tracking-tight text-white">Service</h5>
    <p class="mb-6 font-light text-sm text-gray-300">Mendapatkan data layanan</p>
    <div class="mb-3 flex flex-wrap">
      <span class="text-xs font-medium me-2 px-2.5 py-0.5 rounded bg-red-900 text-red-300">[ POST ]</span>
    </div>
    <div class="mb-8 flex flex-wrap">
      <span class="text-sm font-medium me-2 px-2.5 py-0.5 rounded bg-murky-600 text-gray-100"><?= base_url('api/service') ?></span>
    </div>
    <div class="relative overflow-x-auto mb-8">
        <table class="w-full text-sm text-left rtl:text-right text-white">
            <thead class="text-xs text-white uppercase bg-murky-700 border-b border-murky-800">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Parameter
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Keterangan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Req
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-murky-600 border-b border-murky-800">
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                        api_id
                    </th>
                    <td class="px-6 py-4">
                      Berisi Api ID Anda
                    </td>
                    <td class="px-6 py-4">
                        Ya
                    </td>
                </tr>
                <tr class="bg-murky-600 border-b border-murky-800">
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                        api_key
                    </th>
                    <td class="px-6 py-4">
                        Berisi Api Key Anda
                    </td>
                    <td class="px-6 py-4">
                        Ya
                    </td>
                </tr>
                <tr class="bg-murky-600 border-b border-murky-800">
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                        signature
                    </th>
                    <td class="px-6 py-4">
                        Berisi formula md5(API ID + API KEY) Anda
                    </td>
                    <td class="px-6 py-4">
                        Ya
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <h5 class="mb-4 text-sm font-semibold tracking-tight text-white">Contoh Respon Yang Ditampilkan</h5>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-white">
            <thead class="text-xs text-white uppercase bg-murky-700 border-b border-murky-800">
                <tr class="whitespace-nowrap">
                    <th scope="col" class="px-6 py-3 text-green-400">
                        Resppon Sukses
                    </th>
                    <th scope="col" class="px-6 py-3 text-red-500">
                        Resppon Gagal
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-murky-600 border-b border-murky-800">
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white text-left">
<pre><code>{
  "result": true,
  "msg": "berhasil mendapatkan data layanan",
  "data": {
      "id": "1",
      "game": "Mobile Legends",
      "nama_layanan": "14 Diamonds ( 13 + 1 Bonus )",
      "harga": {
          "basic": 3310,
          "gold": 3250,
          "platinum": 3120,
      },
      "status": "Aktif"
  }
}
</code></pre>
                    </th>
                    <td class="px-6 py-4">
<pre><code>{
  "result": false,
  "msg": "API ID atau API KEY tidak ditemukan",
}
</code></pre>
// Atau
<pre><code>{
  "result": false,
  "msg": "Signature Tidak Valid. Silakan periksa kredensial API Anda",
}
</code></pre>
// Atau
<pre><code>{
  "result": false,
  "msg": "IP 127.0.0.1 tidak ada dalam whitelist",
}
</code></pre>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
  </div>
</section>

<section class="bg-murky-900 px-3 py-2">
  <div class="w-full mt-4 p-4 bg-murky-800 rounded-lg shadow">
    <h5 class="mb-2 text-3xl font-semibold tracking-tight text-white">Order</h5>
    <p class="mb-6 font-light text-sm text-gray-300">Melakukan pemesanan</p>
    <div class="mb-3 flex flex-wrap">
      <span class="text-xs font-medium me-2 px-2.5 py-0.5 rounded bg-red-900 text-red-300">[ POST ]</span>
    </div>
    <div class="mb-8 flex flex-wrap">
      <span class="text-sm font-medium me-2 px-2.5 py-0.5 rounded bg-murky-600 text-gray-100"><?= base_url('api/order') ?></span>
    </div>
    <div class="relative overflow-x-auto mb-8">
        <table class="w-full text-sm text-left rtl:text-right text-white">
            <thead class="text-xs text-white uppercase bg-murky-700 border-b border-murky-800">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Parameter
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Keterangan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Req
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-murky-600 border-b border-murky-800">
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                        api_id
                    </th>
                    <td class="px-6 py-4">
                      Berisi Api ID Anda
                    </td>
                    <td class="px-6 py-4">
                        Ya
                    </td>
                </tr>
                <tr class="bg-murky-600 border-b border-murky-800">
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                        api_key
                    </th>
                    <td class="px-6 py-4">
                        Berisi Api Key Anda
                    </td>
                    <td class="px-6 py-4">
                        Ya
                    </td>
                </tr>
                <tr class="bg-murky-600 border-b border-murky-800">
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                        order_id
                    </th>
                    <td class="px-6 py-4">
                        Berisi Unik ID yang di buat di sistem anda
                    </td>
                    <td class="px-6 py-4">
                        Ya
                    </td>
                </tr>
                <tr class="bg-murky-600 border-b border-murky-800">
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                        service_id
                    </th>
                    <td class="px-6 py-4">
                        Berisi kode Layanan
                    </td>
                    <td class="px-6 py-4">
                        Ya
                    </td>
                </tr>
                <tr class="bg-murky-600 border-b border-murky-800">
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                        target_id
                    </th>
                    <td class="px-6 py-4">
                        Berisi data id tujuan
                    </td>
                    <td class="px-6 py-4">
                        Ya
                    </td>
                </tr>
                <tr class="bg-murky-600 border-b border-murky-800">
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                        target_server
                    </th>
                    <td class="px-6 py-4">
                        Berisi data server/zone tujuan bila ada
                    </td>
                    <td class="px-6 py-4">
                        No
                    </td>
                </tr>
                <tr class="bg-murky-600 border-b border-murky-800">
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                        signature
                    </th>
                    <td class="px-6 py-4">
                        Berisi formula md5(API ID + API KEY) Anda
                    </td>
                    <td class="px-6 py-4">
                        Ya
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <h5 class="mb-4 text-sm font-semibold tracking-tight text-white">Contoh Respon Yang Ditampilkan</h5>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-white">
            <thead class="text-xs text-white uppercase bg-murky-700 border-b border-murky-800">
                <tr class="whitespace-nowrap">
                    <th scope="col" class="px-6 py-3 text-green-400">
                        Resppon Sukses
                    </th>
                    <th scope="col" class="px-6 py-3 text-red-500">
                        Resppon Gagal
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-murky-600 border-b border-murky-800">
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white text-left">
<pre><code>{
  "result": true,
  "msg": "Pesanan berhasil! Pesanan sedang diproses",
  "data": {
      "order_id": "123456",
      "nama_layanan": "14 Diamonds ( 13 + 1 Bonus )",
      "service_id": "1",
      "target_id": "98765",
      "target_server": "1234",
      "status": "Proses",
      "note": ""
  }
}
</code></pre>
                    </th>
                    <td class="px-6 py-4">
<pre><code>{
  "result": false,
  "msg": "API ID atau API KEY tidak ditemukan",
}
</code></pre>
// Atau
<pre><code>{
  "result": false,
  "msg": "order_id sudah tersedia pada sistem kami",
  "data": {
      "status": "Error",
  }
}
</code></pre>
// Atau
<pre><code>{
  "result": false,
  "msg": "service_id tidak ditemukan",
}
</code></pre>
// Atau
<pre><code>{
  "result": false,
  "msg": "Saldo anda tidak mencukupi"
}
</code></pre>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
  </div>
</section>

<section class="bg-murky-900 px-3 py-2">
  <div class="w-full mt-4 p-4 bg-murky-800 rounded-lg shadow">
    <h5 class="mb-2 text-3xl font-semibold tracking-tight text-white">Status</h5>
    <p class="mb-6 font-light text-sm text-gray-300">Mendapatkan data status pesanan</p>
    <div class="mb-3 flex flex-wrap">
      <span class="text-xs font-medium me-2 px-2.5 py-0.5 rounded bg-red-900 text-red-300">[ POST ]</span>
    </div>
    <div class="mb-8 flex flex-wrap">
      <span class="text-sm font-medium me-2 px-2.5 py-0.5 rounded bg-murky-600 text-gray-100"><?= base_url('api/status') ?></span>
    </div>
    <div class="relative overflow-x-auto mb-8">
        <table class="w-full text-sm text-left rtl:text-right text-white">
            <thead class="text-xs text-white uppercase bg-murky-700 border-b border-murky-800">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Parameter
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Keterangan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Req
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-murky-600 border-b border-murky-800">
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                        api_id
                    </th>
                    <td class="px-6 py-4">
                      Berisi Api ID Anda
                    </td>
                    <td class="px-6 py-4">
                        Ya
                    </td>
                </tr>
                <tr class="bg-murky-600 border-b border-murky-800">
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                        api_key
                    </th>
                    <td class="px-6 py-4">
                        Berisi Api Key Anda
                    </td>
                    <td class="px-6 py-4">
                        Ya
                    </td>
                </tr>
                <tr class="bg-murky-600 border-b border-murky-800">
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                        order_id
                    </th>
                    <td class="px-6 py-4">
                        Berisi id transaksi
                    </td>
                    <td class="px-6 py-4">
                        Ya
                    </td>
                </tr>
                <tr class="bg-murky-600 border-b border-murky-800">
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                        signature
                    </th>
                    <td class="px-6 py-4">
                        Berisi formula md5(API ID + API KEY) Anda
                    </td>
                    <td class="px-6 py-4">
                        Ya
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <h5 class="mb-4 text-sm font-semibold tracking-tight text-white">Contoh Respon Yang Ditampilkan</h5>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-white">
            <thead class="text-xs text-white uppercase bg-murky-700 border-b border-murky-800">
                <tr class="whitespace-nowrap">
                    <th scope="col" class="px-6 py-3 text-green-400">
                        Resppon Sukses
                    </th>
                    <th scope="col" class="px-6 py-3 text-red-500">
                        Resppon Gagal
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-murky-600 border-b border-murky-800">
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white text-left">
<pre><code>{
  "result": true,
  "msg": "Detail transaksi berhasil didapatkan",
  "data": {
      "order_id": "123456",
      "status": "Sukses / Proses / Pending / Gagal",
      "note": ""
  }
}
</code></pre>
                    </th>
                    <td class="px-6 py-4">
<pre><code>{
  "result": false,
  "msg": "API ID atau API KEY tidak ditemukan",
}
</code></pre>
// Atau
<pre><code>{
  "result": false,
  "msg": "order_id tidak ditemukan",
  "data": {
      "order_id": "",
      "status": "Error"
  }
}
</code></pre>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
  </div>
</section>

<?= $this->endSection() ?>