@extends('plantilla')

@section('contenido')
<div>
    <h3>Listado de {{ $plural }}</h3>
    <br>

    <div class="row">
        <div class="col-sm-6">
            <form method="POST" id="buscarclase">
                @csrf

                @include('formularios.autocompletado', ['nombrecampo'=>'Buscar', 'campo'=> 'buscar'])           
        </div>
        <div class="col-sm-1 text-left">
                <button type="submit" class="btn btn-success">Filtrar</button>
            </form>
        </div>
        <div class="col-sm-2 text-right">
            <button type="button" class="btn btn-success" onclick="resetearfiltros('{{ route('administracion.clase.resetearfiltrosclase', $clase) }}', '#tablaclase')">
                Mostrar todo
            </button>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-9">            
            <span  id="tablaclase">
                @include('administracion.clase.tabla', ['clase' => $clase, 'objetos' => $objetos])
            </span>
            <p>
                <a class="btn btn-success" data-toggle="collapse" href="#nuevo" role="button" aria-expanded="false" aria-controls="collapseclase">
                    Agregar
                </a>
            </p>        
            <div class="collapse" id="nuevo">
                <div class="card card-body">
                    <form method="POST" id="formnuevo">
                        @csrf
                        <div class="form-group">
                            <label for="clase">Nombre</label>
                            <input type="text" class="form-control" name="objeto" id="objeto">
                            <input type="hidden" class="form-control" name="clase" id="clase" value="{{ $clase }}">
                        </div>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </form> 
                </div>
            </div> 
        </div>
    </div>

@endsection

@section('script')
    <script src="{{ url('js/agregaritem.js') }}"></script>
    <script src="{{ url('js/quitaritem.js') }}"></script>
    <script src="{{ url('js/autocompletar.js') }}"></script>
    <script src="{{ url('js/filtrar.js') }}"></script>
    <script src="{{ url('js/resetearfiltros.js') }}"></script>

    <script>
        $(document).ready(function(){                        
            agregaritem("#nuevo", "#formnuevo", "{{ route('inicio')}}" + "/administracion/agregar/" + "{{ $clase }}" , "#tablaclase");
            autocompletar("#buscar", "{{ route('administracion.clase.buscar',  $clase) }}");
            filtrar("{{ route('administracion.clase.filtrar', $clase) }}", "#buscarclase", "#tablaclase");  
        });
    </script>
@endsection