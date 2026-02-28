<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'name', 'company', 'role', 'testimonial', 'image', 'rating', 'sort_order',
    ];

    protected $casts = [
        'rating' => 'integer',
    ];
}
