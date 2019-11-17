<?php

namespace App\Http\Controllers;

use App\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

function cargar_pacientes()
{
    return Paciente::where('estado', true)->orderBy('apellido')->paginate(20);
}

function cargar_paciente(Paciente $paciente, Request $request)
{
    try
    {
        $paciente->dni = $request->dni;
        $paciente->apellido = $request->apellido;
        $paciente->nombre = $request->nombre;
        if ($request->fecha_nacimiento)
        {
            $paciente->fecha_nacimiento = Carbon::createFromFormat('d/m/Y', $request->fecha_nacimiento)->format('Y-m-d');
        }
        $paciente->sexo = $request->sexo;
        $paciente->estado_civil_id = $request->estado_civil;
        $paciente->ocupacion_id = $request->ocupacion;
        $paciente->obra_social_id = $request->obra_social;
        $paciente->telefono_fijo = $request->telefono_fijo;
        $paciente->telefono_celular = $request->telefono_celular;
        $paciente->email = $request->email;
        $paciente->departamento_id = $request->departamento;
        $paciente->save();
    } catch (Excepction $e) {
        return $e->getMessage();
    }    
}

function cargar_eliminados()
{
    return Paciente::where('estado', false)->orderBy('apellido')->paginate(20);
}

function campos_requeridos($request){
    $request->validate([
        'dni' => 'required',
        'apellido' => 'required',
        'nombre' => 'required'
    ]);
}

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = cargar_pacientes();
        $opciones = true;
        return view('pacientes.listar', compact('pacientes', 'opciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pacientes.formulario');
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
        $paciente = new Paciente();
        cargar_paciente($paciente, $request);
        $mensaje = "Se agregó a " . $paciente->mostrar();
        $correcto = true;    
        return view('pacientes.formulario', compact('mensaje', 'correcto'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente)
    {
        return view('pacientes.detalle', compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $paciente)
    {
        return view('pacientes.formulario', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paciente $paciente)
    {
        campos_requeridos($request);        
        $paciente = Paciente::findorfail($paciente->id);
        cargar_paciente($paciente, $request);
        $mensaje = "Se actualizaron los datos de " . $paciente->mostrar();
        $correcto = true;    
        return view('pacientes.formulario', compact('mensaje', 'correcto'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $correcto = true;
        try {
            $paciente = Paciente::findorfail($request->pacienteid);
            $paciente->estado = false;
            $paciente->save();
            $mensaje = 'Se eliminó a ' . $paciente->mostrar();
        } catch (\Throwable $th) {
            $correcto = false;
        }
        $pacientes = cargar_pacientes();
        $opciones = true;
        return view('pacientes.listar', compact('pacientes', 'mensaje', 'correcto', 'opciones'));
    }

    public function filtrar(Request $request)
    {   
        $correcto = true;

        if ($request->departamento)
        {
            $pacientes = Paciente::where('departamento_id', $request->departamento);
           
        }
        else 
        {
            if($request->provincia)
            {
                $pacientes = Paciente::select('pacientes.*')->join('departamentos', 'departamentos.id', '=', 'pacientes.departamento_id')
                ->join('provincias', 'provincias.id', '=', 'departamentos.provincia_id')
                ->where('provincias.id', $request->provincia);    
            }

        }       
        
        if($request->buscarid)
        {
            $pacientes = Paciente::where('id', $request->buscarid);
        }

        if(isset($pacientes))
        {
            $pacientes = $pacientes->where('estado', true)->orderBy('apellido')->paginate(20);
            $mensaje = "Se aplicaron los filtros exitosamente";
        }
        else 
        {   
            $pacientes = cargar_pacientes();
            $correcto = false;
            if(!isset($mensaje))
            {
                $mensaje = "Debe elegir al menos un filtro";
            }
        }
        $opciones = true;
        return view('pacientes.listado.tabla', compact('pacientes', 'opciones', 'correcto', 'mensaje'));
    }

    public function resetearfiltrospacientes()
    {
        $pacientes = cargar_pacientes();
        $opciones = true;
        return view('pacientes.listado.tabla', compact('pacientes', 'opciones'));
    }

    public function buscar(Request $request)
    {
        $busqueda = $request->get('term');
        $pacientes = Paciente::where('nombre', 'LIKE', '%' . $busqueda. '%')->orwhere('apellido', 'LIKE', '%' . $busqueda. '%');
        $pacientes = $pacientes->where('estado', true)->orderBy('apellido')->get();
        $resultado = array();
        if(!$pacientes->isEmpty()){
            foreach ($pacientes as $paciente){
                $paciente = paciente::find($paciente->id);
                $resultado[] = array('id'=>$paciente->id, 'fila'=>$paciente->mostrar());      
            }
        } else {
            $resultado[] = array('id'=>'', 'fila'=>'Sin resultados');   
        }
        return $resultado;
    }

    public function listar_eliminados()
    {
        $pacientes = cargar_eliminados();
        $eliminados = true;
        $opciones = true;
        return view('pacientes.listar', compact('pacientes', 'opciones','eliminados'));
    }

    public function recuperar_eliminado($id)
    {
        $correcto = true;
        try {
            $paciente = Paciente::findorfail($id);
            $paciente->estado = true;
            $paciente->save();
            $mensaje = 'Se recupero a ' . $paciente->mostrar();
        } catch (\Throwable $th) {
            $correcto = false;
        }
        $pacientes = cargar_eliminados();
        $eliminados = true;
        $opciones = true;
        return view('pacientes.listar', compact('pacientes', 'opciones', 'eliminados', 'mensaje', 'correcto'));
    }

}