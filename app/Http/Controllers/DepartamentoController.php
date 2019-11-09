<?php

namespace App\Http\Controllers;

use App\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    public function listar()
    {
        //Lista de departamentos de Entre Ríos
        return Departamento::where('provincia_id', 7)->get();
    }
}
