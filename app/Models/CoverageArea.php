<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoverageArea extends Model
{
    protected $fillable = ['name', 'coords', 'sort_order'];

    protected $casts = [
        'coords' => 'array',
    ];
}
