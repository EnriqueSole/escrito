<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tarea;
use Illuminate\Support\Facades\Validator;

class TareaController extends Controller
{
    public function Crear(Request $request){
        $Tarea=new Tarea;
        $Validaciones= Validator::make($request->all(),[
            "titulo"=>"required",
            "contenido"=>"required",
            "estado"=>"required",
            "autor"=>"required",
        ]);
       if ($Validaciones->fails()){
        return response([$Validaciones->errors()], 400 );
       }
       $Tarea->titulo=$request->titulo;
       $Tarea->contenido=$request->contenido;
       $Tarea->estado=$request->estado;
       $Tarea->autor=$request->autor;
       $Tarea->save();
       return $Tarea;
    }

    public function Leer($idTarea) {
        $Tarea=Tarea::find($idTarea);
        if (!$Tarea) return response(["Mensaje" =>"Tarea no encontrada"], 404);
        return $Tarea;
    }
    public function Eliminar($idTarea){
        $Tarea=Tarea::find($idTarea);
        if (!$Tarea) return response(["Mensaje" =>"Tarea no encontrada"], 404);
        $Tarea->delete();
        return response(["Mensaje" => "Tarea eliminada"], 200);
    }

    public function Modificar(Request $request,$idTarea){
        $Tarea=Tarea::find($idTarea);
        if (!$Tarea) return response(["Mensaje" =>"Tarea no encontrada"], 404);
        $Validaciones= Validator::make($request->all(),[
            "titulo"=>"required",
            "contenido"=>"required",
            "estado"=>"required",
            "autor"=>"required",
        ]);
       if ($Validaciones->fails()){
        return response([$Validaciones->errors()], 400 );
       }
       if ($request->input("titulo") ) $Tarea->titulo=$request->titulo;
       if ($request->input("contenido") ) $Tarea->contenido=$request->contenido;
       if ($request->input("estado") ) $Tarea->estado=$request->estado;
       if ($request->input("autor") ) $Tarea->autor=$request->autor;
       $Tarea->save();
       return $Tarea;
    }

    public function Listar(){
        $Tarea=Tarea::all();
        return $Tarea;
    }

    public function ListarPorTitulo($TareaTitulo) {
        $Tarea=Tarea::where($TareaTitulo);
        if ($Tarea) return $Tarea;
        return response(["Mensaje"=>"Tareas no encontradas", 404]);
    }

    public function ListarPorAutor($TareaAutor) {
        $Tarea=Tarea::where($TareaAutor);
        if ($Tarea) return $Tarea;
        return response(["Mensaje"=>"Tareas no encontradas", 404]);
    }

    public function ListarPorEstado($TareaEstado) {
        $Tarea=Tarea::where($TareaEstado);
        if ($Tarea) return $Tarea;
        return response(["Mensaje"=>"Tareas no encontradas", 404]);
    }
}
