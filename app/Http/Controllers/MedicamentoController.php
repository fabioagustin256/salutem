<?php

namespace App\Http\Controllers;

use App\Medicamento;

use Illuminate\Http\Request;

function obtener_medicamentos()
{
    return Medicamento::where('estado', true)->orderby('nombre')->get();
}

class MedicamentoController extends Controller
{
    public function listar()
    {
        return obtener_medicamentos();
    }  
}
