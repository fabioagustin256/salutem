<div class="row">
    <div class="col-sm-9">            
        <span  id="tablaclase">
            @include('administracion.clase.tabla1', ['clase' => $clase, 'objetos' => $objetos])
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
                        <label for="clase">Nombre</label>
                        @include('formularios.autocompletado', ['campo'=> $clase]) 
                    </div>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </form> 
            </div>
        </div> 
    </div>
</div>

