<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConnectionApplication extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'service', 'message'];
}
