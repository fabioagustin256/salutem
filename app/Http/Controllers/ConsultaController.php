<?php

namespace App\Http\Controllers;

use App\Consulta;
use App\Paciente;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ConsultaController extends Controller
{
    public function agregar(Paciente $paciente, Request $request)
    {
        try {
            $consulta = new Consulta();
            $consulta->fecha = Carbon::createFromFormat('d/m/Y', $request->fecha)->format('Y-m-d');
            $consulta->motivo = $request->motivo;
            $consulta->tratamiento = $request->tratamiento; 
            $consulta->paciente_id = $paciente->id;
            $consulta->save();
        } catch (Excepction $e) {
            return $e->getMessage();
        }   
        $correcto = true;
        $mensaje = "La consulta se agrego correctamente";         
        return view('pacientes.detalles.consultas.tabla', compact('paciente', 'correcto', 'mensaje'));
    }

    public function quitar(Paciente $paciente, Consulta $consulta)
    {
        $correcto = true;
        try {
            $consulta->delete();
            $mensaje = "La consulta se eliminó correctamente";
        } catch (\Throwable $th) {
            $correcto = false;
        }
        return view('pacientes.detalles.consultas.tabla', compact('paciente', 'correcto', 'mensaje'));
    }
}
