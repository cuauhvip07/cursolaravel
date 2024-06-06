<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegistroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {

        // Se debe de cambiar a true para que se pueda acceder al request
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

     // Reglas de validacion
    public function rules(): array
    {
        return [
            'name'=>['required','string'],
            'email'=>['required','email','unique:users,email'],
            'password'=>[
                'required',
                'confirmed',
                Password::min(8)->letters()->symbols()->numbers()
            ]
        ];
    }

    // Valida ion de los mensajes
    public function messages()
    {
        // El password no se puede personalizar mucho
        return [
            'name'=>'El nombre es obligatorio',
            'email.required'=>'El email es obligatorio',
            'email.email'=>'El email no es valido',
            'email.unique'=>'El usuario ya esta registrado',
            'password'=>'El password debe de contener al menos 8 caracteres, un simbolo y un numero'
        ];
    }
}
