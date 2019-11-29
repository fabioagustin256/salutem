<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlergiaPaciente extends Model
{
    protected $table = "alergias_pacientes";

    public function paciente()
    {
        return $this->belongsTo('App\Paciente');
    }

    public function alergia()
    {
        return $this->belongsTo('App\Alergia');
    }

    public function mostrar_clase()
    {
        return $this->alergia();
    }
    
    public function cargar_clasepaciente($claseid, $pacienteid, $observacion)
    {
        try {
            $this->alergia_id = $claseid; 
            $this->paciente_id = $pacienteid;
            $this->observacion = $observacion;
            $this->save();
            return "Se agregó la alergia correctamente";
        } catch (Excepction $e) {
            return $e->getMessage();
        }
    }
}