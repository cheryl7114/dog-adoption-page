<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin 1
        User::create([
            'name' => 'Admin 1',
            'email' => 'admin1@example.com',
            'password' => Hash::make('password1'),
            'role' => 'admin',
        ]);

        // Admin 2
        User::create([
            'name' => 'Admin 2',
            'email' => 'admin2@example.com',
            'password' => Hash::make('password2'),
            'role' => 'admin',
        ]);

        // Example normal users
        User::create([
            'name' => 'Normal User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'John Smith',
            'email' => 'john@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Emily Brown',
            'email' => 'emily@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
        
        User::create([
            'name' => 'Michael Green',
            'email' => 'michael@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
    }
}
