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

    public function habitos_toxicos()
    {
        return $this->belongsTo('App\HabitoToxico');
    }

    public function mostrar_clase()
    {
        return $this->habitos_toxicos();
    }
}
