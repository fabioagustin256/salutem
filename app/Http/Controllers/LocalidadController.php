<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalidadController extends Controller
{
    public function listar($id){
        return Localidad::where('departamento_id', $id)->get();
    }
}
