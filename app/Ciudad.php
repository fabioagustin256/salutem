<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = 'ciudades';

    public function provincia()
    {
        return $this->belongsTo('App\Provincia');
    }
}
