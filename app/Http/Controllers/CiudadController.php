<?php

namespace App\Http\Controllers;

use App\Ciudad;
use Illuminate\Http\Request;

class CiudadController extends Controller
{
    public function ciudadesprovincia($provincia_id)
    {
        return Ciudad::where('provincia_id', $provincia_id)->get();
    }
}
