<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class GameHistory extends Model
{
    /** @use HasFactory<\Database\Factories\GameHistoryFactory> */
    use HasFactory;

    protected $casts = [
        'steps' => 'array',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
    public function gameType(): BelongsTo
    {
        return $this->belongsTo(GameType::class);
    }
    // protected $table ='public.game_histories';
}
