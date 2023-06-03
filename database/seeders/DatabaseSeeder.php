<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            'fullname' => 'Administrator',
            'email' => 'admin@mail.com',
            'password' => bcrypt('12345678'),
            'role' => 1,
            'is_active' => 1,
            'created_at' => now(),
            'updated_at' => null
        ]);
    }
}
