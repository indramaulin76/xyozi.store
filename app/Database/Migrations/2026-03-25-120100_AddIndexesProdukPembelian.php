<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddIndexesProdukPembelian extends Migration
{
    public function up(): void
    {
        $this->db->disableForeignKeyChecks();

        // produk: speed lookup by SKU and brand
        if ($this->db->tableExists('produk')) {
            $this->ensureIndex('produk', 'idx_produk_kode_produk', 'kode_produk');
            $this->ensureIndex('produk', 'idx_produk_brand', 'brand');
        }

        // pembelian: order_id lookups (callback, invoice)
        if ($this->db->tableExists('pembelian')) {
            $this->ensureIndex('pembelian', 'idx_pembelian_order_id', 'order_id');
            $this->ensureIndex('pembelian', 'idx_pembelian_status', 'status_pembelian');
        }

        $this->db->enableForeignKeyChecks();
    }

    public function down(): void
    {
        $this->dropIndexIfExists('produk', 'idx_produk_kode_produk');
        $this->dropIndexIfExists('produk', 'idx_produk_brand');
        $this->dropIndexIfExists('pembelian', 'idx_pembelian_order_id');
        $this->dropIndexIfExists('pembelian', 'idx_pembelian_status');
    }

    private function ensureIndex(string $table, string $indexName, string $column): void
    {
        if (! $this->db->tableExists($table)) {
            return;
        }
        $indexes = $this->db->getIndexData($table);
        foreach ($indexes as $idx) {
            if ($idx->name === $indexName) {
                return;
            }
        }
        $this->db->query("ALTER TABLE `{$table}` ADD INDEX `{$indexName}` (`{$column}`)");
    }

    private function dropIndexIfExists(string $table, string $indexName): void
    {
        if (! $this->db->tableExists($table)) {
            return;
        }
        $indexes = $this->db->getIndexData($table);
        foreach ($indexes as $idx) {
            if ($idx->name === $indexName) {
                $this->db->query("ALTER TABLE `{$table}` DROP INDEX `{$indexName}`");

                return;
            }
        }
    }
}
