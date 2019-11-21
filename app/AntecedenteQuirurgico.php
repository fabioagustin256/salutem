<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AntecedenteQuirurgico extends Model
{
    protected $table = "antecedentes_quirurgicos";

    public function mostrar()
    {
        return $this->nombre;
    }    
}
