<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StruksTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('struks')->insert([
                'id_toko' => rand(1, 10),
                'nama_sales' => $faker->name,
                'status' => $faker->randomElement(['in', 'out']),
                'tgl_masuk_barang' => $faker->date,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
