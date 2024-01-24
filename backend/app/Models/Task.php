<?php

namespace App\Models;

use App\Observers\TaskObserver;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends BaseModel
{
    protected $fillable = [
        'developer_id',
        'name',
        'hour',
        'difficulty',
    ];

    protected static function boot()
    {
        parent::boot();

        static::observe(TaskObserver::class);
    }

    public function developer(): BelongsTo
    {
        return $this->belongsTo(Developer::class);
    }
}
