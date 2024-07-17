<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class DataSetSedder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Seed Nusers table
        // for ($i = 0; $i < 5; $i++) {
        //     DB::table('nusers')->insert([
        //         'name' => $faker->name,
        //         'email' => $faker->unique()->safeEmail,
        //         'password' => Hash::make('password'),
        //         'role' => $faker->randomElement(['customer', 'owner', 'employee']),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }

        // Seed Nproducts table
        for ($i = 0; $i < 5; $i++) {
            DB::table('nproducts')->insert([
                'id_owner'=> 1,
                'nama_barang' => $faker->word,
                'tersedia' => $faker->numberBetween(1, 100),
                'images' => $faker->imageUrl(),
                'satuan' => $faker->randomElement(['pcs', 'box', 'kg']),
                'harga' => $faker->randomNumber(1, 10000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Seed Nsales table
        for ($i = 0; $i < 5; $i++) {
            DB::table('nsales')->insert([
                'id_produk' => $faker->numberBetween(1, 5),
                'id_user' => $faker->numberBetween(1, 5),
                'total_harga_bersih' => $faker->randomFloat(2, 1, 1000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Seed NcartItems table
        for ($i = 0; $i < 5; $i++) {
            DB::table('ncart_items')->insert([
                'id_penjualan' => $faker->numberBetween(1, 5),
                'id_user' => $faker->numberBetween(1, 5),
                'quantity' => $faker->numberBetween(1, 10),
                'total_harga' => $faker->randomFloat(2, 1, 1000),
                'quality' => $faker->randomElement(['high', 'medium', 'low']),
                'diskon' => $faker->randomFloat(2, 0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Seed Npurchases table
        for ($i = 0; $i < 5; $i++) {
            DB::table('npurchases')->insert([
                'id_produk' => $faker->numberBetween(1, 5),
                'id_user' => $faker->numberBetween(1, 5),
                'inisialisasi' => $faker->randomElement(['In', 'Return']),
                'status_pembayaran' => $faker->randomElement(['Paid', 'Unpaid']),
                'jumlah_stok' => $faker->numberBetween(1, 100),
                'jatuh_tempo' => $faker->date(),
                'total_harga' => $faker->randomFloat(2, 1, 1000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Seed Nowners table
        // for ($i = 0; $i < 5; $i++) {
        //     DB::table('nowners')->insert([
        //         'nama_toko' => $faker->company,
        //         'id_user' => $faker->numberBetween(1, 5),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }

        // Seed Nemployees table
        // for ($i = 0; $i < 5; $i++) {
        //     DB::table('nemployees')->insert([
        //         'id_owner' => $faker->numberBetween(1, 5),
        //         'id_user' => $faker->numberBetween(1, 5),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }
    }
}
