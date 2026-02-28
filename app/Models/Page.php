<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title', 'slug', 'meta_title', 'meta_description',
        'hero_title', 'hero_subtitle', 'hero_image', 'content', 'status',
    ];
}
