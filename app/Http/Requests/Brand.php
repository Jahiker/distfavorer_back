<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Brand extends FormRequest
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
            'name' => 'required|unique:App\Brand,name|min:2|max:50',
            'logo' => 'file|image'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio',
            'name.unique' => 'Ya existe una categoria con este nombre',
            'name.min' => 'El nombre debe contener al menos 2 caracteres',
            'name.max' => 'El nombre debe contener maximo 50 caracteres',
            'logo.file' => 'El archivo no cargo correctamente',
            'logo.image' => 'Formato de imagen no permitido'
        ];
    }
}
