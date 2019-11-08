<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProvinciaController extends Controller
{
    public function listar(){
        return Provincia::where('id', 7)->orwhere('id', 20)->get();
    }
}
