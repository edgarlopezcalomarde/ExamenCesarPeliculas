<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DirectorRequest;
use Src\DTO\DirectorDTO;
use Src\Service\impl\DirectoresService;
use Src\Service\IDirectoresService;

class DirectoresController extends Controller
{

    private IDirectoresService $servicio;

    public function __construct()
    {
        $this->middleware('auth:sanctum',['except' => ['index', 'show']]);
        $this->servicio = new DirectoresService();
    }



    public function index()
    {
        return response()->json($this->servicio->all() , 200);
    }


    public function store(DirectorRequest $request)
    {

        $directorDTO = new DirectorDTO(
            null,
            $request->nombre,
            $request->apellido,
        );

        return response()->json($this->servicio->insert($directorDTO),201);

    }


    public function show($id)
    {
        return response()->json($this->servicio->find($id),200);
    }


    public function update(DirectorRequest $request, $id)
    {
        $directorDTO = new DirectorDTO(
            $id,
            $request->nombre,
            $request->apellido,
        );

        return response()->json($this->servicio->update($directorDTO),201);
    }


    public function destroy($id)
    {
        return response()->json($this->servicio->delete($id),204);
    }
}
