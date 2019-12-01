<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AntecedenteQuirurgicoPaciente extends Model
{
    protected $table = "antecedentes_quirurgicos_pacientes";

    public function paciente()
    {
        return $this->belongsTo('App\Paciente');
    }

    public function ant_quirurgico()
    {
        return $this->belongsTo('App\AntecedenteQuirurgico');
    }

    public function mostrar_clase()
    {
        return $this->ant_quirurgico();
    }

    public function cargar_clasepaciente($claseid, $pacienteid, $observacion)
    {
        try {
            $this->ant_quirurgico_id = $claseid; 
            $this->paciente_id = $pacienteid;
            $this->observacion = $observacion;
            $this->save();
            return "Se agregó el antecedente quirurgico correctamente";
        } catch (Excepction $e) {
            return $e->getMessage();
        }
    }
}
