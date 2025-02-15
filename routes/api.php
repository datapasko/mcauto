<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CarController;

Route::controller(CarController::class)->prefix('cars')->group(function () {
	Route::get('/all', 'getIndexPaginate');
	Route::get('/last', 'getLastCars');
	Route::post('/buy-car', 'buyCar');
	Route::post('/{car}/show', 'show');
});