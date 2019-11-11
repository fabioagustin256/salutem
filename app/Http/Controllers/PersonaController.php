<?php

namespace App\Http\Controllers;

use App\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

function cargar_personas()
{
    return Persona::where('estado', true)->orderBy('apellido')->paginate(20);
}

function cargar_persona(Persona $persona, Request $request)
{
    try
    {
        $persona->dni = $request->dni;
        $persona->apellido = $request->apellido;
        $persona->nombre = $request->nombre;
        $persona->fecha_nacimiento = Carbon::createFromFormat('d/m/Y', $request->fecha_nacimiento)->format('Y-m-d');
        $persona->sexo = $request->sexo;
        $persona->ocupacion_id = $request->ocupacion;
        $persona->estado_civil_id = $request->estado_civil;
        $persona->telefono_fijo = $request->telefono_fijo;
        $persona->telefono_celular = $request->telefono_celular;
        $persona->email = $request->email;
        $persona->localidad_id = $request->localidad;
        $persona->save();
    } catch (Excepction $e) {
        return $e->getMessage();
    }    
}

function campos_requeridos($request){
    $request->validate([
        'dni' => 'required',
        'apellido' => 'required',
        'nombre' => 'required'
    ]);
}


class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = cargar_personas();
        $opciones = true;
        return view('personas.listar', compact('personas', 'opciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('personas.formulario');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        campos_requeridos($request);
        $persona = new Persona();
        cargar_persona($persona, $request);
        $mensaje = "Se agregó a " . $persona->mostrar();
        $correcto = true;    
        return view('personas.formulario', compact('mensaje', 'correcto'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        return view('personas.detalle', compact('persona'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona)
    {
        return view('personas.formulario', compact('persona'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        campos_requeridos($request);        
        $persona = Persona::findorfail($persona->id);
        cargar_persona($persona, $request);
        $mensaje = "Se actualizaron los datos de " . $persona->mostrar();
        $correcto = true;    
        return view('personas.formulario', compact('mensaje', 'correcto'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $correcto = true;
        try {
            $persona = Persona::findorfail($request->personaid);
            $persona->estado = false;
            $persona->save();
            $mensaje = 'Se eliminó a ' . $persona->mostrar();
        } catch (\Throwable $th) {
            $correcto = false;
        }
        $personas = cargar_personas();
        $opciones = true;
        return view('personas.listar', compact('personas', 'mensaje', 'correcto', 'opciones'));
    }

}
