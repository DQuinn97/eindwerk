<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $roles = [
            ['name' => 'Admin', 'permissions' => 1],
            ['name' => 'User', 'permissions' => 0],
        ];
        \App\Models\Role::insert($roles);
    }
}
