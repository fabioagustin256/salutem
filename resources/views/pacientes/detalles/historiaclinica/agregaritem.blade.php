@isset($correcto)
    @include('formularios.mensajes', ['mensaje' => $mensaje, 'correcto'=> $correcto])

    @if($correcto)
        Medicamento: {{ $objetoclase->nombre }} <br>
        <div class="form-group"> 
            <input type="hidden" name="buscarid" value="{{ $objetoclase->id }}">
        </div>
        <div class="form-group">    
            <label for="observacion">Observación</label>
            <textarea class="form-control" name="observacion" rows="3"></textarea></div>      
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    @endif

@endisset