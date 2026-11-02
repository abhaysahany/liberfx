<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashVideo extends Model
{
    use HasFactory;

    public const STATUS_LIVE = 'Live';

    public const STATUS_NOT_LIVE = 'Non Live';

    protected $fillable = [
        'video',
        'status',
    ];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_LIVE);
    }
}
