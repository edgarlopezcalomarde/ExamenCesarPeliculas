<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PeliculaRequest;

use Src\DTO\PeliculaDTO;
use Src\Service\impl\PeliculasService;
use Src\Service\IPeliculasService;

class PeliculasController extends Controller
{
    private IPeliculasService $servicio;

    public function __construct()
    {
        $this->middleware('auth:sanctum',['except' => ['index', 'show']]);
        $this->servicio = new PeliculasService();
    }

    public function index()
    {
        return response()->json($this->servicio->all(),200);
    }


    public function store(PeliculaRequest $request)
    {

        $peliDTO = new PeliculaDTO(
           null,
            $request->nombre,
            $request->año,
            $request->duracion,
            $request->director_id,
        );

        return response()->json($this->servicio->update($peliDTO),201);

    }


    public function show($id)
    {
        // $pelicula = Pelicula::findOrFail($id);

        // $pelicula->actores;
        // $pelicula->director;

        return response()->json($this->servicio->find($id),200);
    }

    public function update(PeliculaRequest $request,  $id)
    {

        $peliDTO = new PeliculaDTO(
            $id,
            $request->nombre,
            $request->año,
            $request->duracion,
            $request->director_id,
        );

        return response()->json($this->servicio->update($peliDTO),201);
    }


    public function destroy($id)
    {
        return response()->json($this->servicio->delete($id),204);
    }
}
