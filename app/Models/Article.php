<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'slug', 'featured_image', 'excerpt', 'content', 'category',
        'meta_title', 'meta_description', 'status', 'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];
}
