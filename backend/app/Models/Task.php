<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends BaseModel
{
    protected $fillable = [
        'developer_id',
        'name',
        'hour',
        'difficulty'
    ];

    /**
     * @return BelongsTo
     */
    public function developer(): BelongsTo
    {
        return $this->belongsTo(Developer::class);
    }
}
