<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameHistory extends Model
{
    /** @use HasFactory<\Database\Factories\GameHistoryFactory> */
    use HasFactory;

    protected $casts = [
        'steps' => 'array',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function gameLobbyHistory()
    {
        return $this->belongsTo(GameLobbyHistory::class);
    }
    public function gameType()
    {
        return $this->belongsTo(GameType::class);
    }
}
