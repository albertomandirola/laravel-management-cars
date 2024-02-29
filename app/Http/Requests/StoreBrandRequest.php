<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandRequest extends FormRequest
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
            'name' => 'required|max:50|unique:brands',
            'year' => 'nullable|max:4',
            'phone_number' => 'required|max:30',
            'email_address' => 'required|max:50',
            'logo' => 'nullable|image',
            'description' => 'nullable'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Il nome del brand è obbligatorio',
            'name.max' => 'Il nome del brand deve essere lungo al massimo 50 caratteri',
            'year.max' => 'L\'anno non può essere più lungo di 4 cifre',
            'phone_number.required' => 'Il numero di telefono è obbligatorio',
            'phone_number.max' => 'Il numero di telefono non può superare le 30 cifre',
            'email_address.required' => 'L\'indirizzo email è obbligatorio',
            'email_address.max' => 'L\'indirizzo email non può superare i 50 caratteri',
            'logo.image' => 'Il file del logo deve essere un\'immagine'
        ];
    }
}
