<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = ['county_id', 'name', 'sort_order'];

    public function county()
    {
        return $this->belongsTo(County::class);
    }
}
