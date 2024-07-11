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
        Schema::create('reture_inventories', function (Blueprint $table) {
            $table->id('id_reture_inventory');
            $table->foreignId('id_toko')->constrained('tokos');
            $table->foreignId('id_produk')->constrained('produks');
            $table->integer('qty');
            $table->date('tgl');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reture_inventories');
    }
};
