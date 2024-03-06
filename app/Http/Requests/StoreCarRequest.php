<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'model' => 'required|max:50',
            'brand_id' => 'exists:brands,id',
            'year' => '',
            'type_of_engine' => '',
            'plate' => 'max:7|unique:cars',
            'type_of_gear' => 'max:30|',
            'n_chassis' => 'max:17|unique:cars',
            'price' => 'max:8',
            'doors' => '',
            'seats' => '',
            'color' => 'max:20',
            'power' => '',
            'photos' => 'max:255',
            'description' => ''
        ];
    }
    public function messages()
    {
        return [
            'model.required' => 'Il nome del brand è obbligatorio',
            'model.max' => 'Il nome del modello deve essere massimo di 50 caratteri',
            'brand_id.required' => 'Il nome del brand è obbligatorio',
            'brand_id.exists' => 'Il nome del brand deve essere scelto tra quelli disponibili',
            'year.required' => 'L\'anno di produzione è obbligatorio',
            'type_of_engine.required' => 'Il tipo di alimentazione è obbligatorio',
            'plate.min' => 'Il numero di targa deve essere di 7 caratteri',
            'plate.max' => 'Il numero di targa deve essere di 7 caratteri',
            'plate.unique' => 'È già presente un\'auto con questo numero di targa',
            'type_of_gear.required' => 'Il tipo di trasmissione è obbligatorio',
            'type_of_gear.required' => 'Il tipo di trasmissione deve essere massimo di 30 caratteri',
            'n_chassis.max' => 'Il numero di telaio deve essere di 17 caratteri',
            'n_chassis.unique' => 'È già presente un\'auto con questo numero di telaio',
            'price.required' => 'Il prezzo dell\'auto è obbligatorio',
            'price.max' => 'Il prezzo dell\'auto non può superare i 999.999,99€',
            'doors.required' => 'Il numero di porte è obbligatorio',
            'seats.required' => 'Il numero di posti passeggero è obbligatorio',
            'color.required' => 'Il colore è obbligatorio',
            'color.max' => 'Il colore deve essere massimo di 20 caratteri',
            'power.required' => 'Il numero di porte è obbligatorio',
            'photos.max' => 'Il link alla foto non può superare i 255 caratteri',
            'description.required' => 'La descrizione del progetto è obbligatoria'
        ];
    }
}
