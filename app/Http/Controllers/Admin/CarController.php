<?php

namespace App\Http\Controllers\Admin;


use App\Models\Car;
use App\Models\Brand;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
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
        $error_plate = '';
        $error_chassis = '';
        return view('admin.cars.create', compact('brands', 'optionals', 'error_plate', 'error_chassis'));
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
        if ($request->hasFile('path_image')) {

            $path = Storage::disk('public')->put('car_photos', $form_data['path_image']);

            $form_data['path_image'] = $path;
        };

        // Verifica se esiste un altra macchina con la stessa targa 


        if ($form_data['plate'] != null) {
            $exists = Car::where('plate', 'LIKE', $form_data['plate'])
                ->where('id', '!=', $car->id)
                ->exists();

            if ($exists) {
                $error_plate = 'Hai inserito una targa già presente in un altro articolo';
                return redirect()->route('admin.cars.edit', compact('car', 'error_plate'));
            }
        }

        // Verifica se esiste un altra macchina con lo stesso numero di telaio

        if ($form_data['n_chassis'] != null) {
            $exists = Car::where('n_chassis', 'LIKE', $form_data['n_chassis'])
                ->where('id', '!=', $car->id)
                ->exists();

            if ($exists) {
                $error_chassis = 'Hai inserito una targa già presente in un altro articolo';
                return redirect()->route('admin.cars.edit', compact('car', 'error_chassis'));
            }
        }

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

        $fullprice = $car->price; // Inizializza $fullprice con il prezzo base del veicolo

        if (count($car->optionals) > 0) {
            foreach ($car->optionals as $optional) {
                $fullprice += $optional->price; // Aggiungi il prezzo opzionale a $fullprice
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
        $error_plate = '';
        $error_chassis = '';
        return view('admin.cars.edit', compact('car', 'brands', 'optionals', 'error_plate', 'error_chassis'));
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

        // Verifica se esiste un altra macchina con la stessa targa 

        if ($form_data['plate'] != '') {
            $exists = Car::where('plate', 'LIKE', $form_data['plate'])
                ->where('id', '!=', $car->id)
                ->exists();

            if ($exists) {
                $error_message = 'Hai inserito una targa già presente in un altro articolo';
                return redirect()->route('admin.cars.edit', compact('car', 'error_message'));
            }
        }

        // Verifica se esiste un altra macchina con lo stesso numero di telaio

        if ($form_data['n_chassis'] != '') {
            $exists = Car::where('n_chassis', 'LIKE', $form_data['n_chassis'])
                ->where('id', '!=', $car->id)
                ->exists();

            if ($exists) {
                $error_message = 'Hai inserito una targa già presente in un altro articolo';
                return redirect()->route('admin.cars.edit', compact('car', 'error_message'));
            }
        }



        // controllo se nel form stanno mettendo il file image 
        if ($request->hasFile('path_image')) {

            // controllo se il file aveva già un immagine in precedenza 
            if ($car->path_image != null) {
                Storage::disk('public')->delete($car->path_image);
            }
            $path = Storage::disk('public')->put('car_photos', $form_data['path_image']);

            $form_data['path_image'] = $path;
        }

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
        // controllo se il file aveva già un immagine in precedenza 
        if ($car->cover_image != null) {
            Storage::disk('public')->delete($car->cover_image);
        }

        $car->optionals()->detach();
        $car->delete();
        return redirect()->route('admin.cars.index');
    }
}
