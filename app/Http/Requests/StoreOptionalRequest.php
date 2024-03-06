<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOptionalRequest extends FormRequest
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
            'name' => 'required|max:50|min:5',
            'price' => 'required|max:8|min:3',
            'color' => 'max:30|min:5',
            'description' => 'max:60000|min:15'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name of optional is mandatory',
            'name.max' => 'The name can be a max of 50 characters length',
            'name.min' => 'The name must be at least 5 characters length',
            'price.required' => 'The price of optional is mandatory',
            'price.max' => 'The price can be a max of 8 characters length',
            'price.min' => 'The price must be at least 3 characters length',
            'color.max' => 'The color can be a max of 30 characters length',
            'color.min' => 'The color must be at least 5 characters length',
            'description.max' => 'The description can be a max of 60.000 characters length',
            'description.min' => 'The description must be at least 15 characters length',
        ];
    }
}
