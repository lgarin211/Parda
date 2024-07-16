<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNcartItemsTable extends Migration
{
    public function up()
    {
        Schema::create('ncart_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_penjualan');
            $table->unsignedBigInteger('id_user');
            $table->integer('quantity');
            $table->decimal('total_harga', 10, 2);
            $table->string('quality');
            $table->decimal('diskon', 10, 2);
            $table->timestamps();

            $table->foreign('id_penjualan')->references('id')->on('nsales');
            $table->foreign('id_user')->references('id')->on('nusers');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ncart_items');
    }
}
