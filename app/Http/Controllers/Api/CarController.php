<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function get_brand_cars($slug)
    {
        $cars = DB::table('cars')
            ->join('brands', 'cars.brand_id', '=', 'brands.id')
            ->select('cars.*', 'brands.slug as brandSlug')
            ->where('brands.slug', $slug)
            ->paginate(3);

        return response()->json([
            'success' => true,
            'results' => $cars
        ]);
    }

    public function show($slug)
    {
        $car = Car::with('optionals', 'brand')->where('slug', $slug)->first();
        if ($car) {
            return response()->json([
                'success' => true,
                'car' => $car
            ]);
        }

        return response()->json([
            'success' => false
        ]);
    }
}
