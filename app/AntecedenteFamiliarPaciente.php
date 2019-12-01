<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AntecedenteFamiliarPaciente extends Model
{
    protected $table = "antecedentes_familiares_pacientes";

    public function paciente()
    {
        return $this->belongsTo('App\Paciente');
    }

    public function ant_familiar()
    {
        return $this->belongsTo('App\AntecedenteFamiliar');
    }

    public function mostrar_clase()
    {
        return $this->ant_familiar();
    }

    public function cargar_clasepaciente($claseid, $pacienteid, $observacion)
    {
        try {
            $this->ant_familiar_id = $claseid; 
            $this->paciente_id = $pacienteid;
            $this->observacion = $observacion;
            $this->save();
            return "Se agregó el antecedente familiar correctamente";
        } catch (Excepction $e) {
            return $e->getMessage();
        }
    }
}
