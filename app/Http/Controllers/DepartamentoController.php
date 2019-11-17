<?php

namespace App\Http\Controllers;

use App\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    public function departamentosprovincia($provincia_id)
    {
        return Departamento::where('provincia_id', $provincia_id)->get();
    }
}
