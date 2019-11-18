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
                    <td> {{ $objeto->medicamento->nombre }} </td>
                    <td> {{ $objeto->observacion }} </td>
                    <td>                                       
                        <button type="button" class="btn btn-danger btn-sm" onclick="quitaritem('{{ route('administracion.clase.quitar',  array($clase, $objeto->id)) }}', '#tablaclase')">
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