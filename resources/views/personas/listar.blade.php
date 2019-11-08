@extends('plantilla')

@section('contenido')

    <h3>Listado de personas</h3>

    <br><br>

    <div class="row">
        <div class="col-sm-11">
 
        </div>
        <div class="col-sm-1 text-sm-right">     
            <a class="btn btn-primary" href="{{ route('personas.create') }}" role="button">Agregar</a>
        </div>
    </div>

    <br>
            
    <span id="tablapersonas">
        @include('personas.listado.tabla', ['personas' => $personas]) 
    </span>

@endsection