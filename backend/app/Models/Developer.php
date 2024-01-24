<?php

namespace App\Models;

use App\Models\Scopes\SortingScope;
use App\Observers\DeveloperObserver;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Developer extends BaseModel
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'status',
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new SortingScope);
        static::observe(DeveloperObserver::class);
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    public function getFullNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }
}
