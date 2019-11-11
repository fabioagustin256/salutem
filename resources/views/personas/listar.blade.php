@extends('plantilla')

@section('contenido')

    <h3>Listado de personas</h3>

    <br><br>

    <div class="row">
        <div class="col-sm-11">
 
        </div>
        <div class="col-sm-1 text-sm-right">     
            <a class="btn btn-primary" href="{{ route('personas.create') }}" role="button">Agregar</a>
        </div>
    </div>

    <br>
            
    <span id="tablapersonas">
        @include('personas.listado.tabla', ['personas' => $personas]) 
    </span>

    <div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="eliminarLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('personas.destroy', 'idpersona') }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="eliminarLabel">ADVERTENCIA</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="mensaje" class="text-center"></div>
                        <input type="hidden" name="personaid" id="personaid" value="">                   
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Si</button>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{ url('js/quitaritem.js') }}"></script>

    <script>
        $(document).ready(function(){
            $("#eliminar").on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var personaid = button.data('personaid');
                var apellido = button.data('apellido');
                var nombre = button.data('nombre');
                
                var modal = $(this);
                modal.find(".modal-body #mensaje").html("¿Está seguro que desea eliminar a " + nombre + " " + apellido + "?");
                modal.find(".modal-body #personaid").val(personaid);
            });          
        });
    </script>
@endsection