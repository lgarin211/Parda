<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNpurchasesTable extends Migration
{
    public function up()
    {
        Schema::create('npurchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_produk');
            $table->unsignedBigInteger('id_user');
            $table->string('inisialisasi');
            $table->string('status_pembayaran');
            $table->integer('jumlah_stok');
            $table->date('jatuh_tempo');
            $table->decimal('total_harga', 10, 2);
            $table->timestamps();

            $table->foreign('id_produk')->references('id')->on('nproducts');
            $table->foreign('id_user')->references('id')->on('nusers');
        });
    }

    public function down()
    {
        Schema::dropIfExists('npurchases');
    }
}
