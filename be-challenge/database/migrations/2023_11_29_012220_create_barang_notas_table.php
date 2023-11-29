<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangNotasTable extends Migration
{
    public function up()
    {
        Schema::create('barang_notas', function (Blueprint $table) {
            $table->foreignId('KodeNota')->constrained('notas', 'KodeNota');
            $table->foreignId('KodeBarang')->constrained('barangs', 'KodeBarang');
            $table->integer('JumlahBarang');
            $table->decimal('HargaSatuan', 10, 2);
            $table->decimal('Jumlah', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('barang_notas');
    }
};
