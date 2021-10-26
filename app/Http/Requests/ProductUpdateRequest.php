<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductUpdateRequest extends FormRequest
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
            'name' => 'required|min:3|max:191',
            'code' => ['required', 'min:3', 'max:12', Rule::unique('products')->ignore($this->product->id)],
            'description' => 'required|min:3|max:191',
            'image' => 'file|image',
            'category' => 'required',
            'brand' => 'required',
            'status' => 'required',
            'favorite' => 'required'
        ];
    }

    public function messages()
    {
       return [
           'name.required' => 'Este campo es obligatorio',
           'name.min' => 'El nombre debe contener al menos 3 caracteres',
           'name.max' => 'El nombre no puede sobrepasar los 191 caracteres',
           'code.required' => 'Este campo es obligatorio',
           'code.min' => 'El codigo de contener al menos 3 caracteres',
           'code.max' => 'El codigo debe contener maximo 12 caracteres',
           'code.unique' => 'Ya el codigo fue registrado previamente',
           'description.required' => 'Este campo es obligatorio',
           'description.min' => 'La descripcion debe contener al menos 3 caracteres',
           'description.max' => 'La descripcion no puede sobrepasar los 191 caracteres',
           'image.file' => 'No se cargo el archivo correctamente',
           'image.image' => 'El archivo debe ser una imagen',
           'category.required' => 'Este campo es obligatorio',
           'brand.required' => 'Este campo es obligatorio',
           'status.required' => 'Debe seleccionar una opcion',
           'favorite.required' => 'Debe seleccionar una opcion'
       ];
    }
}
