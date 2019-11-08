<td  class="text-center">{{ number_format($persona->dni, 0, ',', '.') }}</td>
<td>{{ $persona->apellido }}</td>
<td>{{ $persona->nombre }}</td>
<td class="text-center">{{ date('d/m/Y', strtotime($persona->fecha_nacimiento)) }}</td>
<td class="text-center">    </td>
@if (!empty($persona->localidad))
    <td  class="text-center">{{ $persona->localidad->nombre }}</td>
    <td class="text-center">{{ $persona->localidad->departamento->nombre }}</td>
@else
    <td class="text-center">-</td>
    <td class="text-center">-</td>
@endif