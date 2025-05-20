<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    /** @use HasFactory<\Database\Factories\MessageFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'message',
        'visible'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function chatlog(): BelongsTo
    {
        return $this->belongsTo(Chatlog::class);
    }
    // protected $table = 'public.messages';
}
