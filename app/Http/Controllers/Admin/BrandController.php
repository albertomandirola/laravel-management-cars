<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBrandRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrandRequest $request)
    {
        // recupero i dati inviati dalla form
        $form_data = $request->all();

        // verifico se la richiesta contiene il campo logo:
        if ($request->hasFile('logo')) {
            // eseguo l'upload del file e recupero il path
            $path = Storage::disk('public')->put('brands_logos', $form_data['logo']);
            $form_data['logo'] = $path;
        }

        // creo una nuova istanza del model Brand
        $brand = new Brand();

        // creo lo slug del progetto
        $slug = Str::slug($form_data['name'], '-');
        $form_data['slug'] = $slug;

        // riempio gli altri campi con la funzione fill()
        $brand->fill($form_data);

        // salvo il record sul db
        $brand->save();

        // effettuo il redirect alla view index
        return redirect()->route('admin.brands.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        return view('admin.brands.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBrandRequest  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        // recupero i dati inviati dalla form
        $form_data = $request->all();

        // creo lo slug della tipologia
        $form_data['slug'] = Str::slug($form_data['name'], '-');

        // aggiorno il record sul db
        $brand->update($form_data);

        // effettuo il redirect alla view index
        return redirect()->route('admin.brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        // elimino la tipologia dal db
        $brand->delete();

        return redirect()->route('admin.brands.index')->with('message', 'Hai cancellato correttamente la tipologia');
    }
}
