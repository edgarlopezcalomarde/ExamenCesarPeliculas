<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DirectorRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            "nombre" => "required|unique:directores",
            "apellido" => "required"
        ];
    }

    public function messages()
    {
        return [
            "nombre.required" => "El nombre es necesario",
            "nombre.unique" => "Ese director ya existe",
            "apellido.required"=> "El direcctor es necesario"
        ];
    }
}
