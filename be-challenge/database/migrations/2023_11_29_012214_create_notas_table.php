<?php

// database/migrations/[timestamp]_create_notas_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotasTable extends Migration
{
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->id('KodeNota');
            $table->foreignId('KodeTenan')->constrained('tenans', 'KodeTenan');
            $table->foreignId('KodeKasir')->constrained('kasirs', 'KodeKasir');
            $table->date('TglNota');
            $table->time('JamNota');
            $table->decimal('JumlahBelanja', 10, 2);
            $table->decimal('Diskon', 5, 2);
            $table->decimal('Total', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notas');
    }
};
