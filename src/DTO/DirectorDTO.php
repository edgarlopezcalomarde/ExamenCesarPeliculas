<?php
namespace Src\DTO;

use JsonSerializable;

class DirectorDTO implements JsonSerializable{
    function __construct(private ?int $id,private string $nombre, private string $apellido)
    {
        $this->id=$id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;

    }


    function id(){
        return $this->id;
    }

    function nombre(){
        return $this->nombre;
    }

    function apellido(){
        return $this->apellido;
    }

    function jsonSerialize(): mixed {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'apellido' => $this->apellido
        ];
    }

}
