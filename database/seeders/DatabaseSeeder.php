<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Membuat 10 user biasa
        // User::factory(10)->create();

        // Membuat admin user
        User::factory()->create([
            'name' => 'Admin User',
            'lname' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'type' => 'admin',
        ]);
    }
}
