<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Car extends Model
{   

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeByBrand($query, $brand)
    {
        if($brand)
            return $query->where('brand', $brand);            
    }

    public function scopeByColor($query, $color)
    {
        if($color)
            return $query->where('color', $color);            
    }

    public function scopeByYear($query, $year)
    {
        if($year)
            return $query->whereYear('year', $year);            
    }
}
