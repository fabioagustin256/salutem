<?php

namespace App\Http\Controllers;

use App\AntecedentePatologico;

use Illuminate\Http\Request;

function obtener_antecedentes_patologicos()
{
    return AntecedentePatologico::where('estado', true)->orderby('nombre')->get();
}

class AntecedentePatologicoController extends Controller
{
    public function listar()
    {
        return obtener_medicamentos();
    } 
}
