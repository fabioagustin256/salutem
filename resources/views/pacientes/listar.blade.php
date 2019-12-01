@extends('plantilla')

@section('contenido')

    <h3>Listado de pacientes</h3>

    <br>
                
    @include('pacientes.listado.filtros')       
    
    <br><br>

    <div class="row">
        <div class="col-sm-6">
            <form method="POST" id="buscarpaciente">
                @csrf

                @include('formularios.autocompletado', ['nombrecampo'=>'Buscar', 'campo'=>'buscar'])           
        </div>
        <div class="col-sm-4">
                <button type="submit" class="btn btn-success">Filtrar</button>
            </form>
        </div>
        <div class="col-sm-2 text-sm-right">     
            <a class="btn btn-primary" href="{{ route('pacientes.create') }}" role="button">Agregar</a>
        </div>
    </div>

    <br>
            
    <span id="tablapacientes">
        @include('pacientes.listado.tabla', ['pacientes' => $pacientes]) 
    </span>

    <div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="eliminarLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('pacientes.destroy', 'idpaciente') }}" method="POST">
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
                        <input type="hidden" name="pacienteid" id="pacienteid" value="">                   
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
    <script src="{{ url('js/elegirciudad.js') }}"></script>
    <script src="{{ url('js/filtrar.js') }}"></script>
    <script src="{{ url('js/resetearfiltros.js') }}"></script>
    <script src="{{ url('js/autocompletar.js') }}"></script>
    <script src="{{ url('js/quitaritem.js') }}"></script>

    <script>
        $(document).ready(function(){
            elegirciudad("{{ route('provincias.listar') }}", "{{ route('inicio')}}" + "/ciudades/ciudadesprovincia/");
            filtrar("{{ route('filtrarpacientes') }}", "#filtrospacientes", "#tablapacientes");
            autocompletar("#buscar", "{{ route('buscarpaciente') }}");
            filtrar("{{ route('filtrarpacientes') }}", "#buscarpaciente", "#tablapacientes");  

            $("#eliminar").on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var pacienteid = button.data('pacienteid');
                var apellido = button.data('apellido');
                var nombre = button.data('nombre');
                
                var modal = $(this);
                modal.find(".modal-body #mensaje").html("¿Está seguro que desea eliminar a " + nombre + " " + apellido + "?");
                modal.find(".modal-body #pacienteid").val(pacienteid);
            });          
        });
    </script>
@endsection