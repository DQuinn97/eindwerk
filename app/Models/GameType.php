<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GameType extends Model
{
    /** @use HasFactory<\Database\Factories\GameTypeFactory> */
    use HasFactory;

    protected $fillable = ['name', 'description', 'playerMin', 'playerMax'];
    public function gameHistories():HasMany
    {
        return $this->hasMany(GameHistory::class);
    }
    // protected $table ='public.game_types';
}
