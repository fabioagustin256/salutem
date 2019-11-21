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

    public function alergias()
    {
        return $this->belongsTo('App\Alergia');
    }

    public function mostrar_clase()
    {
        return $this->alergias();
    }
}
