<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    protected $fillable = ['name', 'sort_order'];

    public function areas()
    {
        return $this->hasMany(Area::class)->orderBy('sort_order');
    }
}
