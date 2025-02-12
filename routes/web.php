<?php

use App\Models\Car;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Inertia::render('Inicio');
});

Route::get('/coches-segunda-mano-barcelona', function () {
    return Inertia::render('Cars');
});

Route::get('/cars/{car}/show', function (Car $car) {

    dd($car);
    //$car = Car::findOrFail($car); // Busca el usuario o lanza un error 404
    return Inertia::render('ShowCar', ['car' => $car]);
});

/* 
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/users', function () {
        // Matches The "/admin/users" URL
        dd('messi');
    });
}); */