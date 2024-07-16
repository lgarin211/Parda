<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNsalesTable extends Migration
{
    public function up()
    {
        Schema::create('nsales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_produk');
            $table->unsignedBigInteger('id_user');
            $table->decimal('total_harga_bersih', 10, 2);
            $table->timestamps();

            $table->foreign('id_produk')->references('id')->on('nproducts');
            $table->foreign('id_user')->references('id')->on('nusers');
        });
    }

    public function down()
    {
        Schema::dropIfExists('nsales');
    }
}
