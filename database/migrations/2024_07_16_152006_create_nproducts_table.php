<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNproductsTable extends Migration
{
    public function up()
    {
        Schema::create('nproducts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_owner')->constrained('nusers')->onDelete('cascade');
            $table->string('nama_barang');
            $table->integer('tersedia'); // Corrected
            $table->string('images');
            $table->string('satuan');
            $table->decimal('harga', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nproducts');
    }
}
