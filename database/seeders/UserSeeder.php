<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@localhost',
                'password' => bcrypt('admin'),
                'role_id' => 1,
                'email_verified_at' => now(),
            ],
            [
                'name'=> 'User',
                'email' => 'user@localhost',
                'password' => bcrypt('user'),
                'role_id' => 2,
                'email_verified_at' => now(),
            ],
        ];
        \App\Models\User::insert($users);
    }
}
