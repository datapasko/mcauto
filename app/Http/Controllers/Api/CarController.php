<?php

namespace App\Http\Controllers\Api;

use App\Models\Car;
use App\Mail\BuyCarMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class CarController extends Controller
{
    public function getIndexPaginate(Request $request) 
    {
        return Car::with('images')
            ->byBrand($request->brand)
            ->byPrice($request->minPrice, $request->maxPrice)
            ->byYear($request->year)
            ->byType($request->type)
            ->paginate(20); 
    }

    public function getLastCars(Request $request) 
    {
        return Car::with('images')->orderBy('preferential', 'DESC')->take(8)->get();
    }

    public function buyCar(Request $request)
    {
        $details = [
            'subject' => $request->subject,
            'message' => $request->message,
            'service' => $request->service,
            'registration' => $request->registration,
            'model' => $request->model,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'message_client' => $request->message_client,
        ];

       Mail::to('tapaskojd@gmail.com')->send(new BuyCarMail ($details));

       return "Correo enviado!";
    }

    public function show(Request $request, Car $car)
    {
        return $car;
    }
}
