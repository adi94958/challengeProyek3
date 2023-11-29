<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kasir;

class KasirSeeder extends Seeder
{
    public function run()
    {
        Kasir::create([
            'KodeKasir' => 'KS22151105601',
            'Nama' => 'Ani Adi',
            'HP' => '08221511056375',
        ]);

        Kasir::create([
            'KodeKasir' => 'KS22151105602',
            'Nama' => 'Budi Adi',
            'HP' => '08221511056735',
        ]);
    }
}
