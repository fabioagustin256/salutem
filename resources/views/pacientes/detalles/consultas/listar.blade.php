<span id="tablaconsulta">
    @include('pacientes.detalles.consultas.tabla', 
        ['paciente' => $paciente])
</span>

<p>
    <a class="btn btn-success" data-toggle="collapse" href="#nuevaconsulta" role="button" aria-expanded="false" aria-controls="collapseclase">
        Agregar
    </a>
</p>
        
<div class="collapse" id="nuevaconsulta">
    <div class="card card-body">        
        <form method="POST" id="formnuevaconsulta">
            @csrf
            <div class="form-group">
                <label for="fecha" class="col-form-label">Fecha</label>
                <input type="text" class="form-control" id="fecha" name="fecha">
            </div>
            <div class="form-group">    
                <label for="motivo">Motivo</label>
                <textarea class="form-control" name="motivo" rows="3"></textarea>     
            </div>
            <div class="form-group">    
                <label for="tratamiento">Tratamiento</label>
                <textarea class="form-control" name="tratamiento" rows="3"></textarea>   
            </div>
            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </div>
</div> 