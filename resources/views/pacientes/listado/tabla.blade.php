@isset($correcto)
	@include('formularios.mensajes', ['mensaje' => $mensaje, 'correcto'=> $correcto])
@endisset

<table class="table table-bordered table-sm">
    <thead class="thead-dark">
        <tr class="text-center">
            <th scope="col">DNI</th>
            <th scope="col">Apellido</th>
            <th scope="col">Nombre</th>
            <th scope="col">Fec. nacimiento</th>
            <th scope="col">Ocupación</th>
            <th scope="col">Departamento</th>
            <th scope="col">Provincia</th>
            @isset($opciones) 
                <th scope="col">Opciones</th>
            @endisset
        </tr>
    </thead>
    <tbody>   
        @if(count($pacientes))
            @foreach ($pacientes as $paciente)
                <tr>
                    @include('pacientes.listado.campostabla', ['pacientes'=>$pacientes])
                    @isset($opciones)                        
                        <td class="text-center">
                            @if(isset($eliminados))
                                <a class="btn btn-success btn-sm" href="{{ route('pacientes.recuperar_eliminado', $paciente->id) }}" role="button">Recuperar</a>
                            @else 
                                <a class="btn btn-warning btn-sm" href="{{ route('pacientes.edit', $paciente) }}" role="button">Editar</a>
                                <a class="btn btn-primary btn-sm" href="{{ route('pacientes.show', $paciente) }}" role="button">Detalle</a>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminar" data-nombre="{{ $paciente->nombre }}" data-apellido="{{ $paciente->apellido }}" data-pacienteid="{{ $paciente->id }}">Eliminar</button>
                            @endif
                        </td>
                    @endisset
                </tr>
            @endforeach
        @else
            <tr class="text-center">
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                @isset($opciones) 
                    <td>-</td>
                @endisset
            </tr> 
        @endif
    </tbody>
</table>

@isset($pacientes)
    {{ $pacientes->links() }}    
@endisset