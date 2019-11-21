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

    public function antecedente_familiar()
    {
        return $this->belongsTo('App\AntecedenteFamiliar');
    }

    public function mostrar_clase()
    {
        return $this->antecedente_familiar();
    }
}
