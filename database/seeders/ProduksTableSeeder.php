<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProduksTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            DB::table('produks')->insert([
                'nama_produk' => $faker->word,
                'harga' => $faker->randomFloat(2, 1000, 10000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
