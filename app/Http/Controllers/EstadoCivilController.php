<?php

namespace App\Http\Controllers;

use App\EstadoCivil;

use Illuminate\Http\Request;

function obtener_estados_civiles()
{
    return EstadoCivil::where('estado', true)->orderby('nombre')->get();
}

class EstadoCivilController extends Controller
{
    public function listar()
    {
        return obtener_estados_civiles();
    }
}
