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
        <form method="POST" id="formnuevo{{ $clase }}">
            @csrf
            <div class="form-group">                    
                @include('formularios.autocompletado', ['nombrecampo'=>$titulo,'campo'=> $clase]) 
            </div>
            <div class="form-group">
                <label for="observacion">Observación</label>
                <textarea class="form-control" id="observacion" name="observacion"  rows="3"></textarea>
            </div>
            <input type="hidden" name="paciente" value="{{ $pacienteid }}">
            <button type="submit" class="btn btn-success">Guardar</button>
        </form> 
    </div>
</div> 


