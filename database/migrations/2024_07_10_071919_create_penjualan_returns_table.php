<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penjualan_returns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_toko')->constrained('tokos');
            $table->foreignId('id_produk')->constrained('produks');
            $table->foreignId('id_penjualan')->constrained('penjualan_produks');
            $table->integer('qty');
            $table->date('tgl_reture');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualan_returns');
    }
};
