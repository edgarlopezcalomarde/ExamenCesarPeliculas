<?php
namespace Src\DAO\impl;

use App\Models\Pelicula;
use Src\DAO\PeliculasDAO;
use Src\DTO\PeliculaDTO;

class EloquentPeliculasDAO implements PeliculasDAO{

	public function all(): array {
        $result = [];
        $peliculas = Pelicula::all()->toArray();
        foreach ($peliculas as $pelicula){
            array_push($result, new PeliculaDTO(
                $pelicula['id'],
                $pelicula["titulo"],
                $pelicula["año"],
                $pelicula["duracion"],
                $pelicula["director_id"]
            ));
        }
        return $result;
	}

	public function find(int $id): PeliculaDTO {

        $pelicula = Pelicula::findOrFail($id);

        $pelicula->actores;
        $pelicula->director;

        $result = new PeliculaDTO(
            $pelicula['id'],
            $pelicula["titulo"],
            $pelicula["año"],
            $pelicula["duracion"],
            $pelicula["director_id"]
        );

        return $result;
	}


	public function insert(PeliculaDTO $request): bool {

        $pelicula = new Pelicula();
        $pelicula->titulo = $request->titulo();
        $pelicula->año = $request->año();
        $pelicula->duracion = $request->duracion();
        $pelicula->director_id = $request->directorId();
        return $pelicula->save();
	}


	public function update(PeliculaDTO $request): bool {

        $pelicula = Pelicula::findOrFail($request->id());
        $pelicula->titulo = $request->titulo();
        $pelicula->año = $request->año();
        $pelicula->duracion = $request->duracion();
        $pelicula->director_id = $request->directorId();

        return $pelicula->save();
	}

	public function delete(int $id): bool {

        $pelicula = Pelicula::findOrFail($id);
        return $pelicula->delete();
	}
}
