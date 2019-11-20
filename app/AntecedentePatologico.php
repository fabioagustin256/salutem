<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AntecedentePatologico extends Model
{
    protected $table = "antecedentes_patologicos";

    public function mostrar()
    {
        return $this->nombre;
    }
}
