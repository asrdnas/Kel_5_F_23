<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\SuperAdmin;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        SuperAdmin::create([
            'name' => 'SuperAdmin',
            'username' => 'superadmin',
            'email' => 'superadmin@flashnews.com',
            'password' => Hash::make('superadmin'),
        ]);
    }
}
