<?php

namespace App\Domains\Posts\Models;

use App\Domains\Users\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['content'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
