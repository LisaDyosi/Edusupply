<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder {
    public function run() {
        User::insert([
            [
                'name' => 'Provincial Admin',
                'email' => 'province@example.com',
                'password' => Hash::make('department'),
                'role' => 'department',
            ],
            [
                'name' => 'Contractor',
                'email' => 'contractor@example.com',
                'password' => Hash::make('contractor'),
                'role' => 'contractor',
            ],
            [
                'name' => 'School',
                'email' => 'school@example.com',
                'password' => Hash::make('school'),
                'role' => 'school',
            ],
        ]);
    }
}

