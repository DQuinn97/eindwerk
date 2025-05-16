<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    /** @use HasFactory<\Database\Factories\RoleFactory> */
    use HasFactory;

    protected $fillable = ["name", "permissions"];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }
    protected $table = 'public.roles';
}
