<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicamentoPaciente extends Model
{
    protected $table = "medicamentos_pacientes";

    public function paciente()
    {
        return $this->belongsTo('App\Paciente');
    }

    public function medicamento()
    {
        return $this->belongsTo('App\Medicamento');
    }

    public function mostrar_clase()
    {
        return $this->medicamento();
    }

}
