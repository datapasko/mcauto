<?php

namespace App\Http\Controllers\Api;

use App\Models\Car;
use App\Mail\BuyCarMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class CarApiController extends Controller
{
    public function getIndexPaginate(Request $request) 
    {
        //dd($request->color);
        return Car::with('images')
            ->byBrand($request->brand)
            ->byColor($request->color)
            ->byYear($request->year)
            ->paginate(10);
    }

    public function getLastCars(Request $request) 
    {
        return Car::with('images')->latest()->take(4)->get();
    }

    public function buyCar(Request $request)
    {
        Mail::to($request->email)->send(new BuyCarMail);
    }

    public function show(Request $request, Car $car)
    {
        return $car;
    }
}
