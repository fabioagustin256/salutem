<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alergia extends Model
{
    protected $table = "alergias";

    public function mostrar()
    {
        return $this->nombre;
    }
}
