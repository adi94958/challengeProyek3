<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKasirsTable extends Migration
{
    public function up()
    {
        Schema::create('kasirs', function (Blueprint $table) {
            $table->string('KodeKasir')->unique();
            $table->string('Nama');
            $table->string('HP');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kasirs');
    }
};
