<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['id' => 1, 'name' => 'manage_users'], 
            ['id' => 2, 'name' => 'view_users'], 
            ['id' => 3, 'name' => 'manage_messages'], 
            ['id' => 4, 'name' => 'view_messages']
        ];
        \App\Models\Permission::insert($permissions);
    }
}
