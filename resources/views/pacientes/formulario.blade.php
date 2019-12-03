@extends('plantilla')

@section('contenido')
    <a class="btn btn-primary float-right" href="{{ route('pacientes.index') }}" role="button">Volver al listado</a>
    <br><br>
    
    <h5>Ingrese los datos de la paciente:</h5>

    <br>

    @isset($correcto)
        @include('formularios.mensajes', ['mensaje' => $mensaje, 'correcto'=> $correcto])
    @endisset

    <form action="{{ isset($paciente)?route('pacientes.update', $paciente):route('pacientes.store')}}" method="POST">
        @csrf

        @isset($paciente)
            @method('PUT')
        @endisset

        @if($errors->any())
            @include('formularios.mensajes', ['campo'=>'apellido'])
            @include('formularios.mensajes', ['campo'=>'nombre'])
        @endif

        <div class="form-group">
            <label for="dni">DNI</label>
            <input type="text" class="form-control" name="dni" pattern="[0-9]{8}" placeholder="DNI sin puntos(.)" value="{{ isset($paciente)?$paciente->dni:old('dni') }}">
        </div>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="{{ isset($paciente)?$paciente->nombre:old('nombre') }}">
        </div>
        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" name="apellido" value="{{ isset($paciente)?$paciente->apellido:old('apellido') }}">
        </div>
        <div class="form-group">
            <label for="fecha_nacimiento" class="col-form-label">Fecha de nacimiento</label>
            <input type="text" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ isset($paciente)?date('d/m/Y', strtotime($paciente->fecha_nacimiento)):old('fecha_nacimiento') }}">
        </div>
        <div class="form-group">
            <label for="sexo" class="col-form-label">Sexo</label>
            <select name="sexo" id="sexo" class="form-control">
                
                <option value="Sin información">Sin información</option>  
                <option value="Masculino">Masculino</option>  
                <option value="Femenino">Femenino</option>  
            </select>
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
            <label for="obra_social" class="col-form-label">Obra Social</label>
            <div id="obra_social">
            </div>
        </div>
        <div class="form-group">
            <label for="telefono_fijo">Teléfono Fijo</label>
            <input type="text" class="form-control" name="telefono_fijo" value="{{ isset($paciente)?$paciente->telefono_fijo:old('telefono_fijo') }}">
        </div>
        <div class="form-group">
            <label for="telefono_celular">Teléfono Celular</label>
            <input type="text" class="form-control" name="telefono_celular" value="{{ isset($paciente)?$paciente->telefono_celular:old('telefono_celular') }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="{{ isset($paciente)?$paciente->email:old('email') }}">
        </div>
        <div class="form-group">
            <label for="domicilio">Domicilio</label>
            <input type="text" class="form-control" name="domicilio" value="{{ isset($paciente)?$paciente->domicilio:old('domicilio') }}">
        </div>

        @include('formularios.elegirciudad')
        
        <div class="text-right">
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
    </form>
@endsection

@section('script')
    <script src="{{ url('js/calendarioes.js') }}"></script>
    <script src="{{ url('js/elegircampo.js') }}"></script>
    <script src="{{ url('js/elegirciudad.js') }}"></script>

    <script>
        $(document).ready(function(){
            $("#fecha_nacimiento").datepicker();
            elegircampo("estado_civil", "{{ route('estadosciviles.listar')}}", {{ isset($paciente->estado_civil)?$paciente->estado_civil_id:"" }});
            elegircampo("ocupacion", "{{ route('ocupaciones.listar') }}", {{ isset($paciente->ocupacion)?$paciente->ocupacion_id:"" }});
            elegircampo("obra_social", "{{ route('obrassociales.listar') }}", {{ isset($paciente->obra_social)?$paciente->obra_social_id:"" }});              
            elegirciudad("{{ route('provincias.listar') }}", "{{ route('inicio')}}" + "/ciudades/ciudadesprovincia/");
        });
    </script>

@endsection