<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ocupacion extends Model
{
    protected $table = 'ocupaciones';

    public function mostrar(){
        return $this->nombre;
    }
}
