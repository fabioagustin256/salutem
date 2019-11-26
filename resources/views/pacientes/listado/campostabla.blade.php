<td  class="text-center">{{ number_format($paciente->dni, 0, ',', '.') }}</td>
<td>{{ $paciente->apellido }}</td>
<td>{{ $paciente->nombre }}</td>
<td class="text-center">
    @if ($paciente->fecha_nacimiento)
        {{ date('d/m/Y', strtotime($paciente->fecha_nacimiento)) }}
    @else 
        -
    @endif
</td>
<td class="text-center">
    @if($paciente->ocupacion)
        {{ $paciente->ocupacion->nombre }}
    @else
        -
    @endif
</td>
@if (!empty($paciente->ciudad))
    <td  class="text-center">{{ $paciente->ciudad->nombre }}</td>
    <td class="text-center">{{ $paciente->ciudad->provincia->nombre }}</td>
@else
    <td class="text-center">-</td>
    <td class="text-center">-</td>
@endif