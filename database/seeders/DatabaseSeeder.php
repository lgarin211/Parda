<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            UserRolesTableSeeder::class,
            TokosTableSeeder::class,
         // PenjualansTableSeeder::class,
            PenjualanProduksTableSeeder::class,
            ProduksTableSeeder::class,
            UserTokosTableSeeder::class,
            InventoriesTableSeeder::class,
            PenjualanProduksTableSeeder::class,
            PenjualanReturnsTableSeeder::class,
            RetureInventoriesTableSeeder::class,
            StrukInventoriesTableSeeder::class,
            StruksTableSeeder::class,
        ]);
    }
}
