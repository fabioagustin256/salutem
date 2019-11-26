<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    public function ciudades()
    {
        return $this->hasMany('App\Ciudad');
    }
}
