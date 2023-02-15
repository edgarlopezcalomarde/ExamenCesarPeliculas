<?php
namespace Src\DTO;

use JsonSerializable;

class UsuarioDTO implements JsonSerializable{

    function __construct(private ?int $id,private string $nombre, private string $password)
    {
        $this->id=$id;
        $this->nombre = $nombre;
        $this->password = $password;

    }

    function id(){
        return $this->id;
    }

    function nombre(){
        return $this->nombre;
    }

    function password(){
        return $this->password;
    }

    function jsonSerialize(): mixed {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'password' => $this->password
        ];
    }

}
