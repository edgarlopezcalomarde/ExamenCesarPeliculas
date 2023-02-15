<?php
namespace Src\DAO\impl;

use App\Models\Actor;
use Src\DAO\ActoresDAO;
use Src\DTO\ActorDTO;


class EloquentActoresDAO implements ActoresDAO{

	public function all(): array {
        $result = [];
        $actores = Actor::all()->toArray();
        foreach ($actores as $actor){
            array_push($result, new ActorDTO(
                $actor['id'],
                $actor["nombre"],
                $actor["edad"]
            ));
        }
        return $result;
	}

	public function find(int $id): ActorDTO {

        $actor = Actor::findOrFail($id);
        $result = new ActorDTO(
            $actor['id'],
            $actor["nombre"],
            $actor["edad"]
        );
        return $result;
	}


	public function insert(ActorDTO $request): bool {

        $actor = new Actor();
        $actor->nombre = $request->nombre();
        $actor->edad = $request->edad();
        return $actor->save();
	}


	public function update(ActorDTO $request): bool {

        $actor = Actor::findOrFail($request->id());
        $actor->nombre = $request->nombre();
        $actor->edad = $request->edad();
        return $actor->save();

	}

	public function delete(int $id): bool {

        $actor = Actor::findOrFail($id);
        return $actor->delete();
	}
}
