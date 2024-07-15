<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        DB::statement("
                CREATE VIEW sales_view AS
                SELECT
                    penjualans.id_jual AS penjualan_id_jual,
                    penjualans.tanggal AS penjualan_tanggal,
                    penjualans.total_harga AS penjualan_total_harga,
                    penjualan_produks.id_jual AS penjualan_produk_id_jual,
                    penjualan_produks.id_produk AS penjualan_produk_id_produk,
                    penjualan_produks.jumlah AS penjualan_produk_jumlah,
                    struks.id_struk AS struk_id_struk,
                    struks.id_jual AS struk_id_jual,
                    struks.tanggal AS struk_tanggal,
                    struk_inventories.id_struk AS struk_inventory_id_struk,
                    struk_inventories.id_produk AS struk_inventory_id_produk,
                    struk_inventories.jumlah AS struk_inventory_jumlah,
                    tokos.id AS toko_id,
                    tokos.nama AS toko_nama,
                    produks.id AS produk_id,
                    produks.nama AS produk_nama,
                    produks.harga AS produk_harga
                FROM
                    penjualans
                JOIN
                    struks ON penjualans.id_jual = struks.id_jual
                JOIN
                    struk_inventories ON struks.id_struk = struk_inventories.id_struk
                JOIN
                    penjualan_produks ON penjualan_produks.id_jual = penjualans.id_jual
                JOIN
                    tokos ON penjualans.id_toko = tokos.id
                JOIN
                    produks ON produks.id = struk_inventories.id_produk
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS sales_view");
    }
};
