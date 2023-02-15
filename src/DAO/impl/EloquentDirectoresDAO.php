<?php
namespace Src\DAO\impl;

use App\Models\Director;
use Src\DAO\DirectoresDAO;
use Src\DTO\DirectorDTO;

class EloquentDirectoresDAO implements DirectoresDAO{

	public function all(): array {
        $result = [];
        $directores = Director::all()->toArray();
        foreach ($directores as $director){
            array_push($result, new DirectorDTO(
                $director['id'],
                $director["nombre"],
                $director["apellido"]
            ));
        }
        return $result;
	}

	public function find(int $id): DirectorDTO {

        $director = Director::findOrFail($id);
        $result = new DirectorDTO(
            $director['id'],
            $director["nombre"],
            $director["apellido"]
        );
        return $result;
	}


	public function insert(DirectorDTO $request): bool {

        $director = new Director();
        $director->nombre = $request->nombre();
        $director->edad = $request->apellido();
        return $director->save();
	}


	public function update(DirectorDTO $request): bool {

        $director = Director::findOrFail($request->id());
        $director->nombre = $request->nombre();
        $director->edad = $request->apellido();
        return $director->save();

	}

	public function delete(int $id): bool {

        $director = Director::findOrFail($id);
        return $director->delete();
	}
}
