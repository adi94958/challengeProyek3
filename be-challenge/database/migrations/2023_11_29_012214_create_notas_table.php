<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotasTable extends Migration
{
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->string('KodeNota')->unique();
            $table->string('KodeTenan'); // Menggunakan string sebagai kunci asing
            $table->string('KodeKasir'); // Menggunakan string sebagai kunci asing
            $table->date('TglNota');
            $table->time('JamNota');
            $table->decimal('JumlahBelanja', 10, 2);
            $table->decimal('Diskon', 5, 2);
            $table->decimal('Total', 10, 2);
            $table->timestamps();

            $table->index('KodeTenan'); // Menambahkan indeks pada kolom KodeTenan
            $table->index('KodeKasir'); // Menambahkan indeks pada kolom KodeKasir
        });

        // Menambahkan kunci asing manual, karena kita tidak menggunakan foreignId
        Schema::table('notas', function (Blueprint $table) {
            $table->foreign('KodeTenan')->references('KodeTenan')->on('tenans')->onDelete('cascade');
            $table->foreign('KodeKasir')->references('KodeKasir')->on('kasirs')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('notas');
    }
}
