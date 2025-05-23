<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameType extends Model
{
    /** @use HasFactory<\Database\Factories\GameTypeFactory> */
    use HasFactory;

    public function gameHistories()
    {
        return $this->hasMany(GameHistory::class);
    }
}
