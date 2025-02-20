<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CarController;
use App\Http\Controllers\Api\HeroController;

Route::controller(CarController::class)->prefix('cars')->group(function () {
	Route::get('/all', 'getIndexPaginate');
	Route::get('/last', 'getLastCars');
	Route::post('/buy-car', 'buyCar');
	Route::post('/{car}/show', 'show');
});

Route::controller(HeroController::class)->prefix('hero')->group(function () {
	Route::get('/image-principal', 'index');
});