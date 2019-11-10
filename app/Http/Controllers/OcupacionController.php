<?php

namespace App\Http\Controllers;

use App\Ocupacion;

use Illuminate\Http\Request;

function obtener_ocupaciones()
{
    return Ocupacion::where('estado', true)->orderby('nombre')->get();
}

class OcupacionController extends Controller
{
    public function listar()
    {
        return obtener_ocupaciones();
    }  
}
