@extends('plantilla')

@section('contenido')
<div>
    <h3>Listado de {{ $plural }}</h3>
    <br>
    
    <div class="row">
        <div class="col-sm-5">            
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

    <script>
        $(document).ready(function(){
            agregaritem("#nuevo", "#formnuevo", "{{ route('inicio')}}" + "/administracion/agregar/" + "{{ $clase }}" , "#tablaclase");
        });
    </script>
@endsection