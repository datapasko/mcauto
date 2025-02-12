<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Car extends Model
{   
    protected $fillable = [
        'user_id',
        'registration',
        'color',
        'brand',
        'model',
        'year',
        'sticker',
        'fuel',
        'km',
        'cv',
        'transmission',
        'doors',
        'description',
        'price',
        'type_sale',
        'places'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    // Evento que se ejecuta antes de eliminar un Car
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($car) {
            // Eliminar físicamente las imágenes
            foreach ($car->images as $image) {
                Storage::disk('public')->delete($image->image_path);
            }
        });
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
