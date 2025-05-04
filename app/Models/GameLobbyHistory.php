<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameLobbyHistory extends Model
{
    /** @use HasFactory<\Database\Factories\GameLobbyHistoryFactory> */
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function gameHistory()
    {
        return $this->hasOne(GameHistory::class);
    }
}
