<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tenan;

class TenanSeeder extends Seeder
{
    public function run()
    {
        Tenan::create([
            'KodeTenan' => 'TK22151105601',
            'NamaTenan' => 'muhammadmaret',
            'HP' => '08221511056375',
        ]);

        Tenan::create([
            'KodeTenan' => 'TK22151105602',
            'NamaTenan' => 'muhammadmart',
            'HP' => '08221511056735',
        ]);
    }
}
