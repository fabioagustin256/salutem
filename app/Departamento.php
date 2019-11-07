<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    public function provincia()
    {
        return $this->belongsTo('App\Provincia');
    }

    public function localidades()
    {
        return $this->hasMany('App\Localidad');
    }
}
