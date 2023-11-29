<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangNotasTable extends Migration
{
    public function up()
    {
        Schema::create('barang_notas', function (Blueprint $table) {
            $table->string('KodeNota')->unique();
            $table->string('KodeBarang'); // Menggunakan string sebagai kunci asing
            $table->integer('JumlahBarang');
            $table->decimal('HargaSatuan', 10, 2);
            $table->decimal('Jumlah', 10, 2);
            $table->timestamps();

            $table->index('KodeNota'); // Menambahkan indeks pada kolom KodeNota
            $table->index('KodeBarang'); // Menambahkan indeks pada kolom KodeBarang
        });

        // Menambahkan kunci asing manual, karena kita tidak menggunakan foreignId
        Schema::table('barang_notas', function (Blueprint $table) {
            $table->foreign('KodeNota')->references('KodeNota')->on('notas')->onDelete('cascade');
            $table->foreign('KodeBarang')->references('KodeBarang')->on('barangs')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('barang_notas');
    }
}
