<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTokosTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('user_tokos')->insert([
                'id_user' => rand(1, 10),
                'id_toko' => rand(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
