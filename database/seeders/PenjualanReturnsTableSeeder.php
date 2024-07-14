<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PenjualanReturnsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Ambil semua id_penjualan yang ada di penjualan_produks
        $penjualanProdukIds = DB::table('penjualan_produks')->pluck('id')->toArray();

        if(empty($penjualanProdukIds)) {
            // Jika tidak ada data di penjualan_produks, buat data dummy terlebih dahulu
            for ($i = 0; $i < 10; $i++) {
                $penjualanProdukIds[] = DB::table('penjualan_produks')->insertGetId([
                    'id_produk' => rand(1, 10),
                    'id_inventory' => rand(1, 10),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        for ($i = 0; $i < 10; $i++) {
            DB::table('penjualan_returns')->insert([
                'id_toko' => rand(1, 10),
                'id_produk' => rand(1, 10),
                'id_penjualan' => $faker->randomElement($penjualanProdukIds), // Ambil id_penjualan dari array yang valid
                'qty' => $faker->numberBetween(1, 10),
                'tgl_reture' => $faker->date,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
