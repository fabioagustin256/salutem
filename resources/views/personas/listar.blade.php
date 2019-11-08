@extends('plantilla')

@section('contenido')

    <h3>Listado de personas</h3>

    <br>
            
    <span id="tablapersonas">
        @include('personas.listado.tabla', ['personas' => $personas]) 
    </span>

@endsection