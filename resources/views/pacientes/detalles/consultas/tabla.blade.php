@isset($correcto)
    @include('formularios.mensajes', ['mensaje' => $mensaje, 'correcto'=> $correcto])
@endisset

@if($errors->any())
    @include('formularios.mensajes', ['campo'=>'fecha'])
    @include('formularios.mensajes', ['campo'=>'motivo'])
    @include('formularios.mensajes', ['campo'=>'tratamiento'])
@endif

<table class="table table-bordered table-sm">
    <thead class="thead-dark">
        <tr class="text-center">
            <th scope="col">Fecha</th>
            <th scope="col">Motivo</th>
            <th scope="col">Tratamiento</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        @if(count($paciente->consultas))
            @foreach ($paciente->consultas as $consulta)
                <tr class="text-center">
                    <td> {{ date('d/m/Y', strtotime($consulta->fecha)) }} </td>
                    <td> {{ $consulta->motivo }} </td>
                    <td> {{ $consulta->tratamiento }} </td>
                    <td>                                       
                        <button type="button" class="btn btn-danger btn-sm" onclick="quitaritem('{{ route('consultas.quitar',  array($paciente, $consulta)) }}', '#tablaconsulta')">
                            Quitar
                        </button>
                    </td>
                </tr>
            @endforeach
        @else
            <tr class="text-center">
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr> 
        @endif
    </tbody>
</table>