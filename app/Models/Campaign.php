<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Campaign extends Model
{
    use HasFactory;

    const STATUS_ACTIVE = 'ACTIVE';
    const STATUS_PENDING = 'PENDING';
    const STATUS_ARCHIVED = 'ARCHIVED';

    const CAMPAIGN_STATUSES = [
        self::STATUS_ACTIVE,
        self::STATUS_PENDING,
        self::STATUS_ARCHIVED,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function ads(): HasMany
    {
        return $this->hasMany(Post::class);
    }

}
