DNI: 
@if($persona->dni)
    {{ number_format($persona->dni, 0, ',', '.') }}
@else
    -
@endif
<br/>

Nombre: {{ $persona->nombre }} <br/>

Apellido: {{ $persona->apellido }} <br/>

Estado Civil: 
@if($persona->fecha_nacimiento)
    {{ date('d/m/Y', strtotime($persona->fecha_nacimiento)) }}
@else
    -
@endif
<br/>

Sexo: {{ $persona->sexo }} <br/>

Estado civil: 
@if($persona->estado_civil)
    {{ $persona->estado_civil->nombre }}
@else
    -
@endif
<br/>

Ocupación: 
@if($persona->ocupacion)
    {{ $persona->ocupacion->nombre }}
@else
    -
@endif
<br/>

Obra Social: 
@if($persona->obra_social)
    {{ $persona->obra_social->nombre }}
@else
    -
@endif
<br/>

Teléfono Fijo: 
@if($persona->telefono_fijo)
    {{ $persona->telefono_fijo }}
@else
    -
@endif
<br/>

Teléfono Celular: 
@if($persona->telefono_celular)
    {{ $persona->telefono_celular }}
@else
    -
@endif
<br/>


Email: {{ $persona->email }} <br/>
@if (!empty($persona->localidad))
    Localidad: {{ $persona->localidad->nombre }} <br/>
    Departamento: {{ $persona->localidad->departamento->nombre }} <br/>
@endif