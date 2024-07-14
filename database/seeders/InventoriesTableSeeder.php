<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class InventoriesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            DB::table('inventories')->insert([
                'id_toko' => rand(1, 10),
                'id_produk' => rand(1, 10),
                'satuan' => $faker->randomElement(['kg', 'pcs', 'box']),
                'stock_masuk' => $faker->numberBetween(10, 100),
                'stock_keluar' => $faker->numberBetween(1, 10),
                'stock_tersedia' => $faker->numberBetween(1, 90),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
