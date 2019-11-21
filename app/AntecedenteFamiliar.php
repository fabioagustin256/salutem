<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AntecedenteFamiliar extends Model
{
    protected $table = "antecedentes_familiaress";

    public function mostrar()
    {
        return $this->nombre;
    }
}
