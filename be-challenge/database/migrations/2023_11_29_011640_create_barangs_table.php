<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->string('KodeBarang')->unique();
            $table->string('NamaBarang');
            $table->string('Satuan');
            $table->decimal('HargaSatuan', 10, 2);
            $table->integer('Stok');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('barangs');
    }
};
