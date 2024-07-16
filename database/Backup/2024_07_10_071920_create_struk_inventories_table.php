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
        Schema::create('struk_inventories', function (Blueprint $table) {
            $table->id('id_struk');
            $table->foreignId('id_produk')->constrained('produks');
            $table->string('status');
            $table->date('tgl_masuk_barang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('struk_inventories');
    }
};
