<?php

namespace App\Domains\Posts\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['tag'];

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }
}
