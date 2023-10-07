<?php

use App\Http\Controllers\TareaController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::controller(TareaController::class)-> group(function (){
    Route::post("/Tarea", "Crear");
    Route::get("/Tarea/{id}", "Leer");
    Route::delete("/Tarea", "Eliminar");
    Route::put("/Tarea", "Modificar");
    Route::get("/Tarea", "Listar");
    Route::get("/Tarea/Titulo/{Titulo}", "ListarPorTitulo");
    Route::get("/Tarea/Autor/{Autor}", "ListarPorAutor");
    Route::get("/Tarea/Estado/{Estado}", "ListarPorEstado");
});
