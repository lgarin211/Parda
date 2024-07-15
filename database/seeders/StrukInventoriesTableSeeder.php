<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StrukInventoriesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('struk_inventories')->insert([
                'id_struk' => $i+1, // Unique random number
                'id_produk' => rand(1, 10),
                'status' => $faker->randomElement(['in', 'out']),
                'tgl_masuk_barang' => $faker->date,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
