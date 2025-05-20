<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GameTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gametypes = [
            ['id' => 1, 'name' => 'TicTacToe', 'playerMin' => 2, 'playerMax' => 2], 
            ['id' => 2, 'name' => 'Chess', 'playerMin' => 2, 'playerMax' => 2], 
            ['id' => 3, 'name' => 'Uno', 'playerMin' => 2, 'playerMax' => 4], 
            ['id' => 4, 'name' => 'Rummi', 'playerMin' => 2, 'playerMax' => 4]
        ];
        \App\Models\GameType::insert($gametypes);
    }
}
