<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Traits\NuevoObjetoTrait;


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
    use NuevoObjetoTrait;

    public function listar($clase, $plural)
    {
        $objetos = obtener_objetos($clase);
        return view('administracion.clase.listar', compact('objetos', 'clase', 'plural'));
    }

    public function agregar($clase, Request $request)
    {
        $objeto = $request->objeto;
        $resultado = $this->nuevo_objeto_clase($clase, $objeto);
        $mensaje = $resultado['mensaje'];
        $correcto = $resultado['correcto'];
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

    public function buscar($clase, Request $request)
    {
        $modelo = nombre_modelo($clase);
        $busqueda = $request->get('term');
        $objetos = $modelo::where('nombre', 'LIKE', '%' . $busqueda. '%');
        $objetos = $objetos->where('estado', true)->orderBy('nombre')->get();
        $resultado = array();
        if(!$objetos->isEmpty()){
            foreach ($objetos as $objeto){
                $objeto = $modelo::find($objeto->id);
                $resultado[] = array('id'=>$objeto->id, 'fila'=>$objeto->mostrar());        
            }
        } else {
            $resultado[] = array('id'=>'', 'fila'=>'Sin resultados');   
        }
        return $resultado;
    }

    public function filtrar($clase, Request $request)
    {   
        $modelo = nombre_modelo($clase);
        $correcto = true;      
        if($request->buscarid)
        {
            $objetos = $modelo::where('id', $request->buscarid)->get();
        }

        if(isset($objetos))
        {
            $mensaje = "Se aplicaron los filtros exitosamente";
        }
        else 
        {   
            $objetos = obtener_objetos($clase);
            $correcto = false;
            $mensaje = "Debe completar el campo de busqueda";
        }
        return view('administracion.clase.tabla', compact('clase', 'objetos', 'correcto', 'mensaje'));
    }

    public function resetearfiltrosclase($clase)
    {
        $modelo = nombre_modelo($clase);
        $objetos = obtener_objetos($clase);
        return view('administracion.clase.tabla', compact('clase', 'objetos'));
    }
}
