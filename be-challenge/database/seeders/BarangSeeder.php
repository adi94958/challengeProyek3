<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barang;

class BarangSeeder extends Seeder
{
    public function run()
    {
        Barang::create([
            'KodeBarang' => 'BRG22151105601',
            'NamaBarang' => 'Indomie Rasa Adi',
            'Satuan' => 'Bungkus',
            'HargaSatuan' => 3000,
            'Stok' => 50,
        ]);

        Barang::create([
            'KodeBarang' => 'BRG22151105602',
            'NamaBarang' => 'Susu Ultra Adi',
            'Satuan' => 'Pcs',
            'HargaSatuan' => 5000,
            'Stok' => 100,
        ]);
    }
}
