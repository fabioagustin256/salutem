@extends('plantilla')

@section('contenido')
    <a class="btn btn-primary float-right" href="{{ route('pacientes.index') }}" role="button">Volver al listado</a>

    <br><br>

    <div id="accordianId" role="tablist" aria-multiselectable="true">
        <div class="card">
            <div class="card-header" role="tab" id="datospersonalesHeaderId">
                <h5 class="mb-0">
                    <a data-toggle="collapse" data-parent="#accordianId" href="#datospersonalesContentId" aria-expanded="true" aria-controls="datospersonalesContentId">
                        Datos del paciente
                    </a>
                </h5>
            </div>
                <div id="datospersonalesContentId" class="collapse show" role="tabpanel" aria-labelledby="datospersonalesHeaderId">
                    <div class="card-body">
                        @include('pacientes.detalles.datospersonales', ['paciente' => $paciente])
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" role="tab" id="medicamentosHeaderId">
                <h5 class="mb-0">
                    <a data-toggle="collapse" data-parent="#accordianId" href="#medicamentosContentId" aria-expanded="true" aria-controls="medicamentosContentId">
                        Medicamentos
                    </a>
                </h5>
            </div>
                <div id="medicamentosContentId" class="collapse" role="tabpanel" aria-labelledby="medicamentosHeaderId">
                    <div class="card-body">
                        <div id=tablamedicamentospaciente>
                            @include('historiaclinica.clase.listar', ['clase'=>'medicamento', 'objetos'=>$paciente->medicamentospaciente])
                        </div>
                    </div>
                </div>
            </div>
        </div>
     
    </div>

@endsection


@section('script')
    <script src="{{ url('js/autocompletar.js') }}"></script>
    <script src="{{ url('js/agregaritem.js') }}"></script>
    <script src="{{ url('js/quitaritem.js') }}"></script>

    <script>
        $(document).ready(function(){
            
            
        });
    </script>
@endsection