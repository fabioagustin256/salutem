<?php

namespace App\Http\Controllers;

use App\Paciente;

use Illuminate\Http\Request;

function nombre_modelo($clasepaciente)
{
    return 'App\\' . $clasepaciente;
}

function obtener_objetos($clase)
{
    switch ($clase) {
        case 'alergia':
            $objetos = $paciente->medicamentos_paciente;
            break;
        case 'medicamento':
            $objetos = $paciente->medicamentos_paciente;
            break;
    }
    return $objetos;
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

        $objetos = obtener_objetos($clase);

        $correcto = true;  
        
        return view('pacientes.detalles.historiaclinica.tabla1', compact('pacienteid', 'clase', 'clasepaciente', 'objetos', 'correcto', 'mensaje'));
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
        $paciente = Paciente::findorfail($pacienteid);
        switch ($clase) {
            case 'medicamento':
                $objetos = $paciente->medicamentos_paciente;
                break;
        }     
        return view('pacientes.detalles.historiaclinica.tabla1', compact('pacienteid', 'clase', 'clasepaciente', 'objetos', 'correcto', 'mensaje'));
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
        $objetoclase = "";
           
        if ($request->buscarid)
        {
            $claseid = $request->buscarid;
            $modelo = nombre_modelo($clase);
            $objetoclase = $modelo::findorfail($claseid);
            if ($objetoclase->nombre == $request->buscar)
            {
                $correcto = true;
            }
            else
            {
                $correcto = false;
            }
            
        }
        else 
        {
            $mensaje = 'Debe elegir un(a) ' . $clase;
            $correcto = false;    
        }
        if($correcto)        
        {
            $mensaje = "Se agregó correctamente";
        }
        else
        {
            $mensaje = 'Debe elegir un(a) ' . $clase . ' del listado';
        } 

        return view('pacientes.detalles.historiaclinica.agregaritem', compact('clase', 'objetoclase', 'mensaje', 'correcto'));
    }
}
