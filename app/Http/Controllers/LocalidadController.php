<?php

namespace App\Http\Controllers;

use App\Localidad;
use Illuminate\Http\Request;

class LocalidadController extends Controller
{
    public function localidadesdepartamento($id){
        return Localidad::where('departamento_id', $id)->get();
    }
}
