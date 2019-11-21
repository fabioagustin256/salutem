<?php

namespace App\Http\Controllers;

use App\AntecedentePatologicoPaciente;
use App\Paciente;

use Illuminate\Http\Request;

class AntecedentePatologicoPacienteController extends Controller
{
    public function agregar(Request $request)
    {                    
        $pacienteid = $request->paciente;
        $antecedentepatologicoid = $request->antecedentepatologicoid;

        $antecedente_patologico_paciente = AntecedentePatologicoPaciente::where('paciente_id', $pacienteid)->where('antecedente_patologico_id', $medicamentoid)->get();

        if(count($medicamentopaciente)==0)
        {
            try {
                $antecedente_patologico_paciente = new AntecedentePatologicoPaciente();
                $antecedente_patologico_paciente->paciente_id = $pacienteid;
                $antecedente_patologico_paciente->medicamento_id = $antecedentepatologicoid;
                $antecedente_patologico_paciente->observacion = $request->observacion;
                $antecedente_patologico_paciente->save();
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
        $clase = "antecedentepatologico";
        $paciente = Paciente::findorfail($pacienteid);
        $objetos = $paciente->antecedentes_patologicos_paciente;
        return view('pacientes.detalles.historiaclinica.tabla1', compact('pacienteid', 'clase', 'clasepaciente', 'objetos', 'correcto', 'mensaje'));
    }
}
