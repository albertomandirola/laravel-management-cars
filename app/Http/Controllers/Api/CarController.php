<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::paginate(6);

        return response()->json([
            'success' => true,
            'results' => $cars
        ]);
    }
}
