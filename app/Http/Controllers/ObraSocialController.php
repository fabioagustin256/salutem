<?php

namespace App\Http\Controllers;

use App\ObraSocial;

use Illuminate\Http\Request;

function obtener_obras_sociales()
{
    return ObraSocial::where('estado', true)->orderby('nombre')->get();
}

class ObraSocialController extends Controller
{
    public function listar()
    {
        return obtener_obras_sociales();
    }  
}
