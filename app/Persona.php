<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    public function localidad()
    {
        return $this->belongsTo('App\Localidad');
    }

    public function mostrar(){
        $localidad = empty($this->localidad)? "Sin datos": $this->localidad->nombre . " - " . $this->localidad->departamento->nombre;
        return number_format($this->dni, 0, ',', '.') . " - " . $this->nombre . " " . $this->apellido . " - " . $localidad;
    }
}
