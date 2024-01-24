<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Developer extends BaseModel
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'status',
    ];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    public function getFullNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }
}
