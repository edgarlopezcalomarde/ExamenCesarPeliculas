<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            "nombre" => "required|unique:usuarios",
            "password" => "required",
        ];
    }

    public function messages()
    {
        return [
            "nombre.required" => "El nombre de usuario es necesario",
            "nombre.unique" => "El usuario ya existe",
            "password.required" => "La contraseña es necesaria",
        ];
    }
}
