<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActorRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            "nombre" => "required|unique:actores",
            "edad" => "required"
        ];
    }


    public function messages()
    {
        return [
            "nombre.required" => "El nombre es necesario",
            "nombre.unique" => "Ese actor ya existe",
            "edad.required" => "La edad es necesaria"
        ];
    }
}
