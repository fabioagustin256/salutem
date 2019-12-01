<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HabitoToxico extends Model
{
    protected $table = "habitos_toxicos";

    public function mostrar()
    {
        return $this->nombre;
    }
}
