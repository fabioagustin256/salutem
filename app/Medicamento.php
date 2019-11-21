<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    public function mostrar()
    {
        return $this->nombre;
    }

}
