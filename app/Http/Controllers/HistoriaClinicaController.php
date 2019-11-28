<?php

namespace App\Http\Controllers;

use App\Paciente;

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
    public function agregar($pacienteid, $clase, Request $request)
    {
        $clasepaciente = $clase . 'paciente';              
        $claseid = $request->buscarid;
        $observacion = $request->observacion; 

        $modelo = nombre_modelo($clasepaciente);
        $clasepaciente = new $modelo();
        $mensaje = $clasepaciente->cargar_clasepaciente($claseid, $pacienteid, $observacion);
        $paciente = Paciente::findorfail($pacienteid);

        switch ($clase) {
            case 'medicamento':
                $objetos = $paciente->medicamentos_paciente;
                $nombrecampo = 'Medicamento';
                break;
        }

        $correcto = true;  
        
        return view('pacientes.detalles.historiaclinica.listar1', compact('pacienteid', 'nombrecampo', 'clase', 'clasepaciente', 'objetos', 'correcto', 'mensaje'));
    }


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
        return view('pacientes.detalles.historiaclinica.tabla1', compact('clasepaciente', 'clase', 'pacienteid', 'objetos', 'correcto', 'mensaje'));
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
        $objeto = "objetoclase";

        if ($request->buscarid)
        {
            $claseid = $request->buscarid;
            $modelo = nombre_modelo($clase);
            $objetoclase = $modelo::findorfail($claseid);
            $mensaje1 = "Se agregó correctamente";
            $correcto1 = true;
        }
        else 
        {
            $mensaje = 'Debe elegir un(a) ' . $clase;
            $correcto1 = false;    
        }

        return view('pacientes.detalles.historiaclinica.agregaritem', compact('clase', 'objetoclase', 'mensaje1', 'correcto1'));
    }
}
