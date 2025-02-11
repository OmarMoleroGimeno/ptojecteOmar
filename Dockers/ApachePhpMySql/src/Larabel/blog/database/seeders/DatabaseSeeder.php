<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            ['description' => 'administrador', 'created_at' => now(), 'updated_at' => now()],
            ['description' => 'cliente', 'created_at' => now(), 'updated_at' => now()],
            ['description' => 'invitado', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
