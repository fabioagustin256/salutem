<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    public function listar($id){
        return Departamento::where('provincia_id', $id)->get();
    }
}
