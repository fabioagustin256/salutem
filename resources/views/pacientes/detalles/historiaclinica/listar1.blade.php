<span id="tabla{{$clase}}">
    @include('pacientes.detalles.historiaclinica.tabla1', 
        ['clase' => $clase, 'clasepaciente'=>$clasepaciente, 
        'pacienteid'=> $pacienteid, 'objetos' => $objetos])
</span>

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
            </div>
        </form>
    </div>
</div> 

