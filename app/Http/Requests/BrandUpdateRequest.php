<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BrandUpdateRequest extends FormRequest
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
            'name' => ['required', 'min:2', 'max:50', Rule::unique('brands')->ignore($this->brand->id)],
            'logo' => ['file', 'image']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio',
            'name.min' => 'El nombre debe contener al menos 2 caracteres',
            'name.max' => 'El nombre debe contener maximo 50 caracteres',
            'name.unique' => 'Ya existe una categoria con este nombre',
            'logo.file' => 'El archivo no cargo correctamente',
            'logo.image' => 'Formato de imagen no permitido'
        ];
    }
}
