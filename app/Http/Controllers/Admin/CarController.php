<?php

namespace App\Http\Controllers\Admin;


use App\Models\Car;
use App\Models\Brand;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Http\Controllers\Controller;
use App\Models\Optional;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::orderBy('id', 'desc')->get();
        return view('admin.cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $optionals = Optional::all();
        return view('admin.cars.create', compact('brands', 'optionals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarRequest $request)
    {
        // recupero i dati inviati dalla form
        $form_data = $request->all();

        // creo una nuova istanza del model Project
        $car = new Car();

        // riempio gli altri campi con la funzione fill()
        $car->fill($form_data);

        // salvo il record sul db
        $car->save();

        if ($request->has('optional')) {
            $car->optionals()->attach($form_data['optional']);
        }

        // effettuo il redirect alla view index
        return redirect()->route('admin.cars.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        $fullprice = 0;

        if (count($car->optionals) > 0) {
            foreach ($car->optionals as $optional) {
                $fullprice = $car->price + $optional->price;
            }
        }
        return view('admin.cars.show', compact('car', 'fullprice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        $brands = Brand::all();
        $optionals = Optional::all();
        return view('admin.cars.edit', compact('car', 'brands', 'optionals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCarRequest  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarRequest $request, Car $car)
    {
        // recupero i dati inviati dalla form
        $form_data = $request->all();

        // riempio gli altri campi con la funzione fill()
        $car->update($form_data);

        if ($request->has('optional')) {
            $car->optionals()->sync($form_data['optional']);
        }

        // effettuo il redirect alla view index
        return redirect()->route('admin.cars.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->optionals()->detach();
        $car->delete();
        return redirect()->route('admin.cars.index');
    }
}
