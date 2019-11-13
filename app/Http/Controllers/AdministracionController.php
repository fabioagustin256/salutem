<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

function nombre_modelo($clase)
{
    return 'App\\' . $clase;
}

function obtener_objetos($clase)
{
    return nombre_modelo($clase)::orderby('nombre')->get();
}


class AdministracionController extends Controller
{
    // Campos formularios

    public function listar($clase, $plural)
    {
        $objetos = obtener_objetos($clase);
        return view('administracion.clase.listar', compact('objetos', 'clase', 'plural'));
    }

    public function agregar($clase, Request $request)
    {
        $modelo = nombre_modelo($clase);
        $objeto = $modelo::where('nombre', $request->objeto)->get();
        if(count($objeto)==0)
        {
            try {
                $objeto = new $modelo();
                $objeto->nombre = $request->objeto;
                $objeto->save();
                $correcto = true;
                $mensaje = "Se agregó correctamente";
            } catch (\Throwable $th) {
                //throw $th;
            }           
        }
        else 
        {
            $correcto = false;
            $mensaje = "El registro ya se encuentra en el listado";            
        }
        $objetos = obtener_objetos($clase);
        return view('administracion.clase.tabla', compact('clase', 'objetos', 'correcto', 'mensaje'));
    }

    public function cambiarestado($clase, $id)
    {
        $modelo = nombre_modelo($clase);
        $objeto = $modelo::findorfail($id);
        try {
            $objeto->estado = ($objeto->estado ? false : true);
            $objeto->save();
            $correcto = true;
            $mensaje = "Se cambió el estado de " . $clase . " correctamente";
        } catch (\Throwable $th) {
            //throw $th;
        }
        $objetos = obtener_objetos($clase);        
        return view('administracion.clase.tabla', compact('clase', 'objetos', 'correcto', 'mensaje'));
    }

    public function quitar($clase, $id)
    {
        $modelo = nombre_modelo($clase);
        $objeto = $modelo::findorfail($id);
        try {
            $objeto->delete();
            $correcto = true;
            $mensaje = "El/la" . $clase . " se eliminó correctamente";
        } catch (\Throwable $th) {
            $correcto = false;
            $mensaje = "No se puede eliminar el/la" . $clase . " porque está asignado/a";
        }
        $objetos = obtener_objetos($clase);        
        return view('administracion.clase.tabla', compact('clase', 'objetos', 'correcto', 'mensaje'));
    }
}
