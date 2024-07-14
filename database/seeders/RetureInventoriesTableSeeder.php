<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class RetureInventoriesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            DB::table('reture_inventories')->insert([
                'id_toko' => rand(1, 10),
                'id_produk' => rand(1, 10),
                'qty' => $faker->numberBetween(1, 10),
                'tgl' => $faker->date,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
