<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeliculaRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            "titulo" => "required|unique:peliculas",
            "año" => "required",
            "duracion" => "required",
            "director_id" => "required"
        ];
    }


    public function messages()
    {
        return [
            'titulo.required' => 'El titulo es necesario',
            'titulo.unique' => 'El titulo ya existe',
            'año.required' => 'El año es necesario',
            'duracion.required' => 'La duracion es necesaria',
            'director_id.required' => 'El director_id es necesario'
        ];
    }
}
