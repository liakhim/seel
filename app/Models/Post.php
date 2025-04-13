<?php

namespace App\Models;

use App\Observers\CampaignStatusObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    const STATUS_ACTIVE = 'ACTIVE';
    const STATUS_PENDING = 'PENDING';
    const STATUS_ARCHIVED = 'ARCHIVED';

    const AD_STATUSES = [
        self::STATUS_ACTIVE,
        self::STATUS_PENDING,
        self::STATUS_ARCHIVED,
    ];

    const CTA_SHOW_TYPE = 'show';
    const CTA_REQUEST_TYPE = 'request';
    const CTA_DOWNLOAD_TYPE = 'download';
    const CTA_MORE_TYPE = 'more';

    const CTA_TYPES = [
        self::CTA_SHOW_TYPE,
        self::CTA_REQUEST_TYPE,
        self::CTA_DOWNLOAD_TYPE,
        self::CTA_MORE_TYPE,
    ];

    public static function boot()
    {
        Post::observe(CampaignStatusObserver::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function campaign(): BelongsTo
    {
        return $this->belongsTo(Campaign::class);
    }

    public function isZeroBudgetCampaign(): boolean
    {
        return $this->campaign_budget === 0;
    }
}
