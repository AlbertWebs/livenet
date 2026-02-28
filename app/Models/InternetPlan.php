<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InternetPlan extends Model
{
    protected $fillable = [
        'type', 'name', 'speed', 'price', 'currency', 'features',
        'is_highlighted', 'badge', 'sort_order',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_highlighted' => 'boolean',
    ];

    public function getFeaturesListAttribute(): array
    {
        if (empty($this->features)) {
            return [];
        }
        $decoded = json_decode($this->features, true);
        return is_array($decoded) ? $decoded : array_filter(preg_split('/\r\n|\r|\n/', $this->features));
    }
}
