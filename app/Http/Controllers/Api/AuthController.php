<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //Este no hace falta desacoplarlo
    function login(Request $request){
        $usuario = Usuario::where("nombre", $request->nombre)->first();

        if(!$usuario || !Hash::check($request->password, $usuario->password)){
            return response()->json(['error' => 'Credenciales no válidas'], 401);
        }else{
            return response()->json(['token' => $usuario->createToken($usuario->nombre,['*'],now()->addMinutes(30))->plainTextToken]);
        }
    }


}
