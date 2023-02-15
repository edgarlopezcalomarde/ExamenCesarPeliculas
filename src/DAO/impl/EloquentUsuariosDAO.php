<?php
namespace Src\DAO\impl;


use App\Models\Usuario;
use Src\DAO\UsuariosDAO;
use Src\DTO\UsuarioDTO;

class EloquentUsuariosDAO implements UsuariosDAO{

	public function all(): array {
        $result = [];
        $usuarios = Usuario::all()->toArray();
        foreach ($usuarios as $usuario){
            array_push($result, new UsuarioDTO(
                $usuario['id'],
                $usuario["nombre"],
                $usuario["password"]
            ));
        }
        return $result;
	}

	public function find(int $id): UsuarioDTO {

        $usuario = Usuario::findOrFail($id);
        $result = new UsuarioDTO(
            $usuario['id'],
            $usuario["nombre"],
            $usuario["password"]
        );
        return $result;
	}


	public function insert(UsuarioDTO $request): bool {

        $usuario = new Usuario();
        $usuario->nombre = $request->nombre();
        $usuario->password = bcrypt($request->password());
        return $usuario->save();
	}


	public function update(UsuarioDTO $request): bool {

        $usuario = Usuario::findOrFail($request->id());
        $usuario->nombre = $request->nombre();
        $usuario->password = bcrypt($request->password());
        return $usuario->save();

	}

	public function delete(int $id): bool {

        $usuario = Usuario::findOrFail($id);
        return $usuario->delete();
	}
}
