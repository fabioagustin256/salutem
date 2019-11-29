@isset($correcto)
    @include('formularios.mensajes', ['mensaje' => $mensaje, 'correcto'=> $correcto])
@endisset

<table class="table table-bordered table-sm">
    <thead class="thead-dark">
        <tr class="text-center">
            <th scope="col">Nombre</th>
            <th scope="col">Observacion</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        @if(count($objetos))
            @foreach ($objetos as $objeto)
                <tr class="text-center">
                    <td> {{ $objeto->mostrar_clase->nombre }} </td>
                    <td> {{ $objeto->observacion }} </td>
                    <td>                                       
                        <button type="button" class="btn btn-danger btn-sm" onclick="quitaritem('{{ route('historiaclinica.clase.quitar',  array($pacienteid, $clasepaciente, $clase, $objeto->id)) }}', '#tabla{{$clase}}')">
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