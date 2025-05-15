<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Author::create([
            'name' => 'Test User',
            'username' => 'Test User',
            'email' => 'sasa@gmail.com',
            'password' => Hash::make('sasa123'),
        ]);
    }
}
