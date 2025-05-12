<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Message;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([PermissionSeeder::class, RoleSeeder::class, PermissionRoleSeeder::class, GameTypeSeeder::class, GameHistorySeeder::class, UserSeeder::class, MessageSeeder::class]);
    }
}
