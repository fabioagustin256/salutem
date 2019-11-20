<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

function nombre_modelo($clasepaciente)
{
    return 'App\\' . $clasepaciente;
}

function obtener_objetos($pacienteid, $clasepaciente)
{
    return nombre_modelo($clasepaciente)::where('paciente_id', $pacienteid)->get();
}

class HistoriaClinicaController extends Controller
{
    public function quitar($pacienteid, $clasepaciente, $clase, $id)
    {
        $modelo = nombre_modelo($clasepaciente);
        $objeto = $modelo::findorfail($id);
        try {
            $objeto->delete();
            $correcto = true;
            $mensaje = "El registro se eliminó correctamente";
        } catch (\Throwable $th) {
            $correcto = false;
            $mensaje = "No se puede eliminar el registro porque está asignado/a";
        }
        $objetos = obtener_objetos($pacienteid, $clasepaciente);        
        return view('pacientes.detalles.historiaclinica.clase.tabla1', compact('clasepaciente', 'clase', 'pacienteid', 'objetos', 'correcto', 'mensaje'));
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
}
