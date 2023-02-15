<?php
namespace Src\DTO;

use JsonSerializable;

class PeliculaDTO implements JsonSerializable{
    function __construct(private ?int $id,private string $titulo, private int $año, private int $duracion, private int $director_id, )
    {
        $this->id=$id;
        $this->titulo = $titulo;
        $this->año = $año;
        $this->duracion = $duracion;
        $this->director_id = $director_id;
    }

    function id(){
        return $this->id;
    }

    function titulo(){
        return $this->titulo;
    }

    function año(){
        return $this->año;
    }

    function duracion(){
        return $this->duracion;
    }

    function directorId(){
        return $this->director_id;
    }

    function jsonSerialize(): mixed {
        return [
            'id' => $this->id,
            'titulo' => $this->titulo,
            'año' => $this->año,
            'duracion' => $this->duracion,
            'director_id' => $this->director_id
        ];
    }

}
