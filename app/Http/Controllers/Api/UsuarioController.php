<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioRequest;

use Src\DTO\UsuarioDTO;
use Src\Service\impl\UsuariosService;
use Src\Service\IUsuariosService;

class UsuarioController extends Controller
{

    private IUsuariosService $servicio;

    public function __construct()
    {
        $this->middleware('auth:sanctum',['except' => ['index', 'show']]);
        $this->servicio = new UsuariosService();
    }


    public function index()
    {
        return response()->json($this->servicio->all(),200);
    }


    public function store(UsuarioRequest $request)
    {

        $usuarioDTO = new UsuarioDTO(
            null,
            $request->nombre,
            $request->password,
        );

        return response()->json($this->servicio->insert($usuarioDTO),201);
    }


    public function show($id)
    {
        return response()->json($this->servicio->find($id),200);
    }


    public function update(UsuarioRequest $request, $id)
    {

        $usuarioDTO = new UsuarioDTO(
            $id,
            $request->nombre,
            $request->password,
        );

        return response()->json($this->servicio->update($usuarioDTO),201);

    }


    public function destroy($id)
    {
        return response()->json($this->servicio->delete($id),204);
    }
}
