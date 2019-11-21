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

    public function antecedente_quirurgicos()
    {
        return $this->belongsTo('App\AntecedenteQuirurgicos');
    }

    public function mostrar_clase()
    {
        return $this->antecedente_quirurgicos();
    }
}
