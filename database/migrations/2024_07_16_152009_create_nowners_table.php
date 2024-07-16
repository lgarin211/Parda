<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNownersTable extends Migration
{
    public function up()
    {
        Schema::create('nowners', function (Blueprint $table) {
            $table->id();
            $table->string('nama_toko');
            $table->unsignedBigInteger('id_user');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('nusers');
        });
    }

    public function down()
    {
        Schema::dropIfExists('nowners');
    }
}
