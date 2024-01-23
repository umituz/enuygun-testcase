<?php

namespace App\Models;

class Provider extends BaseModel
{
    protected $fillable = [
        'name',
        'identifier',
        'url',
        'status',
    ];
}
