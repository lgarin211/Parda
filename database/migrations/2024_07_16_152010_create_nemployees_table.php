<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNemployeesTable extends Migration
{
    public function up()
    {
        Schema::create('nemployees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_owner');
            $table->unsignedBigInteger('id_user');
            $table->timestamps();

            $table->foreign('id_owner')->references('id')->on('nowners');
            $table->foreign('id_user')->references('id')->on('nusers');
        });
    }

    public function down()
    {
        Schema::dropIfExists('nemployees');
    }
}
