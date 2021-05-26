<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    public function messages()
    {
        return [
            'email.unique'       => 'Este correo ya esta registrado',
            'email.email'        => 'Por favor ingresar una dirección de correo válida',
            'email.required'     => 'Por favor ingresar una dirección de correo válida',
            // 'password.confirmed' => 'Las contraseñas no coinciden',
            // 'password.min'       => 'La contraseña debe tener al menos :min caracteres',
        ];
    }
}
