<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PenjualansTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            DB::table('penjualans')->insert([
                'id_toko' => rand(1, 10),
                'nama_pegawai' => $faker->name,
                'total_harga' => $faker->randomFloat(2, 10000, 100000),
                'tgl_penjualan' => $faker->date,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
