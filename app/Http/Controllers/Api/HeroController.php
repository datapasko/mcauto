<?php

namespace App\Http\Controllers\Api;

use App\Models\Hero;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HeroController extends Controller
{
    public function index()
    {
        $hero = Hero::where('is_active', true)->first(); // Obtén el registro activo
        return  $hero ? $hero->image_url : asset('img/logan.jpg'); 
    }
}
