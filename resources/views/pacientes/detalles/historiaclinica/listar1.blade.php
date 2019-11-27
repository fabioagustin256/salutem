<span id="tabla{{$clase}}">
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
                            <button type="button" class="btn btn-danger btn-sm" onclick="quitaritem('{{ route('historiaclinica.clase.quitar',  array($objeto->paciente->id, $clasepaciente, $clase, $objeto->id)) }}', '#tabla{{$clase}}')">
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


<p>
    <a class="btn btn-success" data-toggle="collapse" href="#nuevo{{ $clase}}" role="button" aria-expanded="false" aria-controls="collapseclase">
        Agregar
    </a>
</p>
        
<div class="collapse" id="nuevo{{ $clase}}">
    <div class="card card-body">
        <form method="POST" id="formnuevo{{ $clase }}">
            @csrf
            <div class="form-group">                    
                @include('formularios.autocompletado', ['nombrecampo'=>$nombrecampo,'campo'=> $clase]) 
            </div>
            <div class="form-group">
                <label for="observacion">Observación</label>
                <textarea class="form-control" id="observacion" name="observacion"  rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Guardar</button>
        </form> 
    </div>
</div> 

</span>