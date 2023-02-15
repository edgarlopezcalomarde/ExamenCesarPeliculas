<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActorRequest;
use Src\DTO\ActorDTO;
use Src\Service\IActoresService;
use Src\Service\impl\ActoresService;

class ActoresController extends Controller
{

    private IActoresService $servicio;

    public function __construct()
    {
        $this->middleware('auth:sanctum',['except' => ['index', 'show']]);
        $this->servicio = new ActoresService();
    }

    public function index()
    {
        return response()->json($this->servicio->all(),200);
    }


    public function store(ActorRequest $request)
    {
        $actorDTO = new ActorDTO(
            null,
            $request->nombre,
            $request->edad,
        );

        return response()->json($this->servicio->insert($actorDTO),201);
    }


    public function show($id)
    {
        return response()->json($this->servicio->find($id),200);
    }


    public function update(ActorRequest $request, $id)
    {

        $actorDTO = new ActorDTO(
            $id,
            $request->nombre,
            $request->edad,
        );

        return response()->json($this->servicio->update($actorDTO),201);
    }


    public function destroy($id)
    {
        return response()->json($this->servicio->delete($id),204);
    }
}
