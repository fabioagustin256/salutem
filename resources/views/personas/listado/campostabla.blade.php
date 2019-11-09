<td  class="text-center">{{ number_format($persona->dni, 0, ',', '.') }}</td>
<td>{{ $persona->apellido }}</td>
<td>{{ $persona->nombre }}</td>
<td class="text-center">
    @if ($persona->fecha_nacimiento)
        {{ date('d/m/Y', strtotime($persona->fecha_nacimiento)) }}
    @else 
        -
    @endif
</td>
<td class="text-center">
    @if($persona->ocupacion)
        {{ $persona->ocupacion }}
    @else
        -
    @endif
</td>
<td class="text-center">
    @if($persona->telefono_fijo)
        {{ $persona->telefono_fijo }}
    @else
        -
    @endif
</td>
<td class="text-center">
    @if($persona->telefono_celular)
        {{ $persona->telefono_celular }}
    @else
        -
    @endif
</td>
@if($persona->email)
    <td> {{ $persona->email }} </td>
@else
    <td class="text-center">-</td>
@endif
@if (!empty($persona->localidad))
    <td  class="text-center">{{ $persona->localidad->nombre }}</td>
    <td class="text-center">{{ $persona->localidad->departamento->nombre }}</td>
@else
    <td class="text-center">-</td>
    <td class="text-center">-</td>
@endif