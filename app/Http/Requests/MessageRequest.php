<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
            'phone' => 'required|min:11|max:20',
            'email' => 'required|email',
            'content' => 'max:240'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Este campo es obligatorio',
            'name.min' => 'El nombre debe contener minimo 4 caracteres',
            'name.max' => 'El nombre no puede contener más de 50 letras',
            'phone.required' => 'Este campo es obligatorio',
            'phone.min' => 'El teléfono debe contener minimo 11 caracteres',
            'phone.max' => 'El teléfono no puede contener más de 50 letras',
            'name.required' => 'Este campo es obligatorio',
            'name.email' => 'Ingrese un email valido',
            'content.max' => 'El texto no puede superar los 240 caracteres'
        ];
    }
}
