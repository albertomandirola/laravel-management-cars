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
        $error_name = '';
        return view('admin.brands.create', compact('error_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBrandRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrandRequest $request, Brand  $brand)
    {
        // recupero i dati inviati dalla form
        $form_data = $request->all();

        // verifico se la richiesta contiene il campo logo:
        if ($request->hasFile('logo')) {
            // eseguo l'upload del file e recupero il path
            $path = Storage::disk('public')->put('brands_logos', $form_data['logo']);
            $form_data['logo'] = $path;
        }

        // Verifica se esiste un altro brand con lo stesso nome

        if ($form_data['name'] != null) {
            $exists = Brand::where('name', 'LIKE', $form_data['name'])
                ->where('slug', '!=', $brand->slug)
                ->exists();

            if ($exists) {
                $error_name = 'Hai inserito una targa già presente in un altro articolo';
                return redirect()->route('admin.brands.create', compact('brand', 'error_name'));
            }
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
        $error_name = '';
        return view('admin.brands.edit', compact('brand','error_name'));
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
       
        // Verifica se esiste un altro brand con lo stesso nome

        if ($form_data['name'] != null) {
            $exists = Brand::where('name', 'LIKE', $form_data['name'])
                ->where('slug', '!=', $brand->slug)
                ->exists();

            if ($exists) {
                $error_name = 'Hai inserito una targa già presente in un altro articolo';
                return redirect()->route('admin.brands.edit', compact('brand', 'error_name'));
            }
        }

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
