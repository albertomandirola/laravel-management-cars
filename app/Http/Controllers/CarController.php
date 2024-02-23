<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;


class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
<<<<<<< HEAD
        return view('admin.cars.create');
=======
       
>>>>>>> file-index
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarRequest $request)
    {
<<<<<<< HEAD
        // recupero i dati inviati dalla form
        $form_data = $request->all();

        // creo una nuova istanza del model Project
        $car = new Car();

        // riempio gli altri campi con la funzione fill()
        $car->fill($form_data);

        // salvo il record sul db
        $car->save();

        // effettuo il redirect alla view index
        return redirect()->route('admin.cars.index');
=======
       
     
>>>>>>> file-index
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
<<<<<<< HEAD
        return view('admin.cars.edit', compact('car'));
=======
        
>>>>>>> file-index
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
<<<<<<< HEAD
        // recupero i dati inviati dalla form
        $form_data = $request->all();

        // riempio gli altri campi con la funzione fill()
        $car->update($form_data);

        // effettuo il redirect alla view index
        return redirect()->route('admin.cars.index');
=======
        
>>>>>>> file-index
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        //
    }
}
