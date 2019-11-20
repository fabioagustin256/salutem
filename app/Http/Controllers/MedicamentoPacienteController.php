<?php

namespace App\Http\Controllers;

use App\MedicamentoPaciente;
use App\Paciente;

use Illuminate\Http\Request;

class MedicamentoPacienteController extends Controller
{
    public function agregar(Request $request)
    {                    
        $pacienteid = $request->paciente;
        $medicamentoid = $request->medicamentoid;

        $medicamentopaciente = MedicamentoPaciente::where('paciente_id', $pacienteid)->where('medicamento_id', $medicamentoid)->get();

        if(count($medicamentopaciente)==0)
        {
            try {
                $medicamentopaciente = new MedicamentoPaciente();
                $medicamentopaciente->paciente_id = $pacienteid;
                $medicamentopaciente->medicamento_id = $medicamentoid;
                $medicamentopaciente->observacion = $request->observacion;
                $medicamentopaciente->save();
                $correcto = true;
                $mensaje = "Se agregó correctamente";
            } catch (Excepction $e) {
                return $e->getMessage();
            }            
        }
        else 
        {
            $correcto = false;
            $mensaje = "El medicamento ya se encuentra en el listado";            
        }
        $clase = "medicamentos";
        $clasepaciente = "medicamentopaciente";
        $paciente = Paciente::findorfail($pacienteid);
        $objetos = $paciente->medicamentospaciente;
        return view('pacientes.detalles.historiaclinica.clase.tabla1', compact('pacienteid', 'clase', 'clasepaciente', 'objetos', 'correcto', 'mensaje'));
    }
}
