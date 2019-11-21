<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AntecedentePatologicoPaciente extends Model
{
    protected $table = "antecedentes_patologicos_pacientes";

    public function paciente()
    {
        return $this->belongsTo('App\Paciente');
    }

    public function antecedente_patologico()
    {
        return $this->belongsTo('App\AntecedentePatologico');
    }

    public function mostrar_clase()
    {
        return $this->antecedente_patologico();
    }
}
