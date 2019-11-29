<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HabitoToxicoPaciente extends Model
{
    protected $table = "habitos_toxicos_pacientes";

    public function paciente()
    {
        return $this->belongsTo('App\Paciente');
    }

    public function habito_toxico()
    {
        return $this->belongsTo('App\HabitoToxico');
    }

    public function mostrar_clase()
    {
        return $this->habito_toxico();
    }

    public function cargar_clasepaciente($claseid, $pacienteid, $observacion)
    {
        try {
            $this->habito_toxico_id = $claseid; 
            $this->paciente_id = $pacienteid;
            $this->observacion = $observacion;
            $this->save();
            return "Se agregó el hábito tóxico correctamente";
        } catch (Excepction $e) {
            return $e->getMessage();
        }
    }
}
