<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Hero extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'is_active',
    ];
    
    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return $this->image ? Storage::disk('public')->url($this->image) : asset('img/logan.jpg');
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

        static::created(function ($hero) {
            if ($hero->is_active) {
                self::where('id', '!=', $hero->id)->update(['is_active' => false]);
            }
        });
    }
}
