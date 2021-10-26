<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Category extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:4|max:50',
            'description' => 'required|min:10|max:191'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio',
            'name.min' => 'El nombre debe contener minimo 2 caracteres',
            'name.max' => 'El nombre debe contener maximo 50 caracteres',
            'description.required' => 'El nombre es obligatorio',
            'description.min' => 'La descripcion debe contener minimo 2 caracteres',
            'description.max' => 'La descripcion debe contener maximo 50 caracteres',
        ];
    }
}
