<?php

namespace App\Controllers;

use App\Models\DeleteModel;
use CodeIgniter\HTTP\Response;

class Delete extends BaseController
{
    public function deleteAllProducts()
    {
        $DeleteModel = new DeleteModel();

        // Menghapus semua data dari tabel produk
        if ($DeleteModel->truncate()) {
            // Berikan respons jika penghapusan berhasil
            return $this->response->setJSON(['status' => 'success', 'message' => 'Semua produk sukses di hapus dari Database.']);
        } else {
            // Berikan respons jika terjadi kesalahan
            return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal delete produk dari Database.']);
        }
    }
}
