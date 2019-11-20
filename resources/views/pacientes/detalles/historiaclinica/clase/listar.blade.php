<span id="tablamedicamento">
    @include('pacientes.detalles.historiaclinica.clase.tabla1', ['pacienteid'=> $pacienteid, 'clase' => $clase, 'clasepaciente'=>$clasepaciente, 'objetos' => $objetos])
</span>

<p>
    <a class="btn btn-success" data-toggle="collapse" href="#nuevo" role="button" aria-expanded="false" aria-controls="collapseclase">
        Agregar
    </a>
</p>        
<div class="collapse" id="nuevo">
    <div class="card card-body">
        <form method="POST" id="formnuevo">
            @csrf
            <div class="form-group">                    
                @include('formularios.autocompletado', ['campo'=> $clase]) 
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


