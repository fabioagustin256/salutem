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

    public function ciudad()
    {
        return $this->belongsTo('App\Ciudad');
    }

    public function mostrar(){
        $departamento = empty($this->ciudad)? "Sin datos": $this->ciudad->nombre . " - " . $this->ciudad->provincia->nombre;
        return number_format($this->dni, 0, ',', '.') . " - " . $this->nombre . " " . $this->apellido . " - " . $departamento;
    }
}
