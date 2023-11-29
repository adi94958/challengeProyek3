<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenansTable extends Migration
{
    public function up()
    {
        Schema::create('tenans', function (Blueprint $table) {
            $table->id('KodeTenan');
            $table->string('NamaTenan');
            $table->string('HP');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tenans');
    }
};
