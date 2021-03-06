DNI: 
@if($paciente->dni)
    {{ number_format($paciente->dni, 0, ',', '.') }}
@else
    -
@endif
<br/>

Nombre: {{ $paciente->nombre }} <br/>

Apellido: {{ $paciente->apellido }} <br/>

Sexo: {{ $paciente->sexo }} <br/>

Fecha de nacimiento: 
@if($paciente->fecha_nacimiento)
    {{ date('d/m/Y', strtotime($paciente->fecha_nacimiento)) }}
@else
    -
@endif
<br/>

Estado civil: 
@if($paciente->estado_civil)
    {{ $paciente->estado_civil->nombre }}
@else
    -
@endif
<br/>

Ocupación: 
@if($paciente->ocupacion)
    {{ $paciente->ocupacion->nombre }}
@else
    -
@endif
<br/>

Obra Social: 
@if($paciente->obra_social)
    {{ $paciente->obra_social->nombre }}
@else
    -
@endif
<br/>

Teléfono Fijo: 
@if($paciente->telefono_fijo)
    {{ $paciente->telefono_fijo }}
@else
    -
@endif
<br/>

Teléfono Celular: 
@if($paciente->telefono_celular)
    {{ $paciente->telefono_celular }}
@else
    -
@endif
<br/>

Email: 
@if($paciente->email)
    {{ $paciente->email }}
@else
    -
@endif
<br/>

Domicilio: 
@if($paciente->domicilio)
    {{ $paciente->domicilio }}
@else
    -
@endif
<br/>

@if (!empty($paciente->ciudad))
    Ciudad: {{ $paciente->ciudad->nombre }} <br/>
    Provincia: {{ $paciente->ciudad->provincia->nombre }} <br/>
@endif