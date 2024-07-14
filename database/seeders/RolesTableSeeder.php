<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = ['Admin', 'Owner','Staff'];
        for ($i = 0; $i < 3; $i++) {
            DB::table('roles')->insert([
                'nama_role' => $roles[$i],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
