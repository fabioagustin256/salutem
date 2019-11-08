<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    public function departamentosprovincia($id){
        return Departamento::where('provincia_id', $id)->get();
    }
}
