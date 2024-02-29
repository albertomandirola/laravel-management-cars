<?php

namespace App\Http\Controllers\Admin;


use App\Models\Car;
use App\Models\Brand;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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

        return view('admin.cars.create', compact('brands'));
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

        // verifico se la richiesta contiene l'immagine 
        if($request->hasFile('photos')){

            $path = Storage::disk('public')->put('car_photos', $form_data['photos']);

            $form_data['photos'] = $path;
            
        };

        // riempio gli altri campi con la funzione fill()
        $car->fill($form_data);

        // salvo il record sul db
        $car->save();

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
        return view('admin.cars.show', compact('car'));
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
        return view('admin.cars.edit', compact('car', 'brands'));
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

        // controllo se nel form stanno mettendo il file image 
        if($request->hasFile('cover_image')){

            // controllo se il file aveva già un immagine in precedenza 
            if($car->cover_image != null){
                Storage::disk('public')->delete($car->photos);
            }
            $path = Storage::disk('public')->put('car_photos', $form_data['photos']);
                
            $form_data['photos'] = $path;
        }

        // riempio gli altri campi con la funzione fill()
        $car->update($form_data);

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
        // controllo se il file aveva già un immagine in precedenza 
        if($project->cover_image != null){
            Storage::disk('public')->delete($project->cover_image);
        }

        $car->delete();
        return redirect()->route('admin.cars.index');
    }
}
