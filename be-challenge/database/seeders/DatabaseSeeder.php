<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            BarangSeeder::class,
            KasirSeeder::class,
            TenanSeeder::class,
            NotaSeeder::class,
        ]);
    }
}
