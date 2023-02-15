<?php
namespace Src\DTO;

use JsonSerializable;

class ActorDTO implements JsonSerializable{
    function __construct(private ?int $id,private string $nombre, private int $edad)
    {
        $this->id=$id;
        $this->nombre = $nombre;
        $this->edad = $edad;

    }


    function nombre(){
        return  $this->nombre;
    }

    function edad(){
        return  $this->edad;
    }

    function id(){
        return  $this->id;
    }

    function jsonSerialize(): mixed {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'edad' => $this->edad
        ];
    }

}
