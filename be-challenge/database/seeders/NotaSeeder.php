<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Nota;
use App\Models\BarangNota;

class NotaSeeder extends Seeder
{
    public function run()
    {
        $nota1 = Nota::create([
            'KodeNota' => 'NO22151105601',
            'KodeTenan' => 'TK22151105601',
            'KodeKasir' => 'KS22151105601',
            'TglNota' => '2023-11-27',
            'JamNota' => '12:00:00',
            'JumlahBelanja' => 100000,
            'Diskon' => 2,
            'Total' => 98000,
        ]);

        $nota2 = Nota::create([
            'KodeNota' => 'NO22151105602',
            'KodeTenan' => 'TK22151105601',
            'KodeKasir' => 'KS22151105601',
            'TglNota' => '2023-11-28',
            'JamNota' => '14:00:00',
            'JumlahBelanja' => 50000,
            'Diskon' => 1,
            'Total' => 49500,
        ]);

        BarangNota::create([
            'KodeNota' => $nota1->KodeNota,
            'KodeBarang' => 'BRG22151105601',
            'JumlahBarang' => 10,
            'HargaSatuan' => 3000,
            'Jumlah' => 30000,
        ]);

        BarangNota::create([
            'KodeNota' => $nota1->KodeNota,
            'KodeBarang' => 'BRG22151105602',
            'JumlahBarang' => 14,
            'HargaSatuan' => 5000,
            'Jumlah' => 70000,
        ]);

        BarangNota::create([
            'KodeNota' => $nota2->KodeNota,
            'KodeBarang' => 'BRG22151105601',
            'JumlahBarang' => 10,
            'HargaSatuan' => 3000,
            'Jumlah' => 30000,
        ]);

        BarangNota::create([
            'KodeNota' => $nota2->KodeNota,
            'KodeBarang' => 'BRG22151105602',
            'JumlahBarang' => 4,
            'HargaSatuan' => 5000,
            'Jumlah' => 20000,
        ]);
    }
}
