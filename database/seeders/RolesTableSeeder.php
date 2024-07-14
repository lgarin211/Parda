<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = ['Admin', 'User', 'Manager', 'Supervisor', 'Staff'];
        for ($i = 0; $i < 10; $i++) {
            DB::table('roles')->insert([
                'nama_role' => $roles[array_rand($roles)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
