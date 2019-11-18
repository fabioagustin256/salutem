<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    public function estado_civil()
    {
        return $this->belongsTo('App\EstadoCivil');
    }

    public function ocupacion()
    {
        return $this->belongsTo('App\Ocupacion');
    }

    public function obra_social()
    {
        return $this->belongsTo('App\ObraSocial');
    }

    public function departamento()
    {
        return $this->belongsTo('App\Departamento');
    }

    public function medicamentospaciente()
    {
        return $this->hasMany('App\MedicamentoPaciente');
    }

    public function mostrar(){
        $departamento = empty($this->departamento)? "Sin datos": $this->departamento->nombre . " - " . $this->departamento->provincia->nombre;
        return number_format($this->dni, 0, ',', '.') . " - " . $this->nombre . " " . $this->apellido . " - " . $departamento;
    }
}
