@extends('plantilla')

@section('contenido')
    <a class="btn btn-primary float-right" href="{{ route('personas.index') }}" role="button">Volver al listado</a>
    <br><br>
    
    <h5>Ingrese los datos de la persona:</h5>

    <br>

    @isset($correcto)
        @include('formularios.mensajes', ['mensaje' => $mensaje, 'correcto'=> $correcto])
    @endisset

    <form action="{{ isset($persona)?route('personas.update', $persona):route('personas.store')}}" method="POST">
        @csrf

        @isset($persona)
            @method('PUT')
        @endisset

        @if($errors->any())
            @include('formularios.mensajes', ['campo'=>'apellido'])
            @include('formularios.mensajes', ['campo'=>'nombre'])
        @endif

        <div class="form-group">
            <label for="dni">DNI</label>
            <input type="text" class="form-control" name="dni" pattern="[0-9]{8}" placeholder="DNI sin puntos(.)" value="{{ isset($persona)?$persona->dni:old('dni') }}">
        </div>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="{{ isset($persona)?$persona->nombre:old('nombre') }}">
        </div>
        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" name="apellido" value="{{ isset($persona)?$persona->apellido:old('apellido') }}">
        </div>
        <div class="form-group">
            <label for="fecha" class="col-form-label">Fecha de nacimiento</label>
            <input type="text" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ isset($persona)?date('d/m/Y', strtotime($persona->fecha_nacimiento)):old('fecha_nacimiento') }}">
        </div>
        <div class="form-group">
            <label for="estado_civil" class="col-form-label">Estado Civil</label>
            <div id="estado_civil">
            </div>
        </div>
        <div class="form-group">
            <label for="ocupacion" class="col-form-label">Ocupación</label>
            <div id="ocupacion">
            </div>
        </div>
        <div class="form-group">
            <label for="telefono_fijo">Teléfono Fijo</label>
            <input type="text" class="form-control" name="telefono_fijo" value="{{ isset($persona)?$persona->telefono_fijo:old('telefono_fijo') }}">
        </div>
        <div class="form-group">
            <label for="telefono_celular">Teléfono Celular</label>
            <input type="text" class="form-control" name="telefono_celular" value="{{ isset($persona)?$persona->telefono_celular:old('telefono_celular') }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="{{ isset($persona)?$persona->email:old('email') }}">
        </div>

        @include('formularios.elegirlocalidad')
        
        <div class="text-right">
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
    </form>
@endsection

@section('script')
    <script src="{{ url('js/calendarioes.js') }}"></script>
    <script src="{{ url('js/elegircampo.js') }}"></script>
    <script src="{{ url('js/elegirlocalidad.js') }}"></script>

    <script>
        $(document).ready(function(){
            $("#fecha_nacimiento").datepicker();
            elegircampo("estado_civil", "{{ route('estadosciviles.listar') }}");
            elegircampo("ocupacion", "{{ route('ocupaciones.listar') }}");            
            elegirlocalidad("{{ route('departamentos.listar') }}", "{{ route('inicio')}}" + "/localidades/localidadesdepartamento/");
        });
    </script>

@endsection