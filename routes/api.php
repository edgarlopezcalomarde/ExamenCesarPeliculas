<?php

use App\Http\Controllers\Api\ActoresController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DirectoresController;
use App\Http\Controllers\Api\PeliculasController;
use App\Http\Controllers\Api\UsuarioController;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::apiResource('/pelicula', PeliculasController::class);
Route::apiResource('/actor', ActoresController::class);
Route::apiResource('/director', DirectoresController::class);

Route::post("/login", [AuthController::class, "login"]);



Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::apiResource('/usuario', UsuarioController::class);
});
