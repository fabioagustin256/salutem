<?php

namespace App\Http\Controllers;

use App\Provincia;

use Illuminate\Http\Request;

class ProvinciaController extends Controller
{
    public function listar(){
        return Provincia::all();
    }
}
