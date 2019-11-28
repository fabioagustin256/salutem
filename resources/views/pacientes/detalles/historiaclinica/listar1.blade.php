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
        <div class="row">
            <div class="col-sm-8">
                <form method="POST" id="buscar{{ $clase}}">
                    @csrf

                    @include('formularios.autocompletado', ['nombrecampo'=>$nombrecampo, 'campo'=>$clase])           
            </div>
            <div class="col-sm-4">
                    <button type="submit" class="btn btn-success">Elegir</button>
                </form>
            </div>
        </div>
        <form method="POST" id="formnuevo{{ $clase }}">
            @csrf
            <div id="formulario{{$clase}}">
                @isset($correcto)
                    @include('formularios.mensajes', ['mensaje1' => $mensaje1, 'correcto1'=> $correcto1])
                @endisset
            </div>
        </form>
    </div>
</div> 

</span>