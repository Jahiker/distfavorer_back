<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => 'required|min:2|max:191',
            'email' => 'required|email',
            'password' => 'max:191',
            'confirm' => 'exclude_if:password,|required_with:password|same:password|min:8|max:191',
            'avatar' => 'image'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El Nombre es oblogatorio',
            'name.min' => 'El nombre debe contener al menos 2 caracteres',
            'name:max' => 'El nombre debe contener maximo 191 caracteres',
            'email.required' => 'El Email es obligatorio',
            'email.email' => 'El Email no es valido',
            'password.min' => 'La Contraseña debe contener al menos 8 caracteres',
            'password.max' => 'La Contraseña debe contener máximo 191 caracteres',
            'confirm.required_with' => 'Debe confirmar la contraseña',
            'confirm.same' => 'Las contraseñas no coinciden',
            'confirm.min' => 'La Contraseña debe contener al menos 8 caracteres',
            'confirm.max' => 'La Contraseña debe contener máximo 191 caracteres',
            'avatar.image' => 'Formato de archivo no permitido'
        ];
    }
}
