<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{    
    protected $fillable = ['car_id', 'image_path'];

    protected $appends = ['image_url'];

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }

    // Mutador para obtener la URL completa de la imagen
    public function getImageUrlAttribute()
    {
        return $this->image_path ? Storage::disk('public')->url($this->image_path) : asset('images/default-car.jpg');
    }


    // Evento que se ejecuta antes de eliminar una imagen
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($image) {
            if ($image->image_path) {
                Storage::disk('public')->delete($image->image_path);
            }
        });
    }
}
