<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRolesTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('user_roles')->insert([
                'id_user' => $i+1,
                'id_role' => rand(1,3),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
