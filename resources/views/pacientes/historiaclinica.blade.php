@extends('plantilla')

@section('contenido')
    <a class="btn btn-primary float-right" href="{{ route('pacientes.index') }}" role="button">Volver al listado</a>

    <br><br>
    <h3 class="text-center">Historia Clínica</h3>

    <br>

    <div id="accordianId" role="tablist" aria-multiselectable="true">
        <div class="card">
            <div class="card-header" role="tab" id="datospersonalesHeaderId">
                <h5 class="mb-0">
                    <a data-toggle="collapse" data-parent="#accordianId" href="#datospersonalesContentId" aria-expanded="true" aria-controls="datospersonalesContentId">
                        Datos del paciente
                    </a>
                </h5>
            </div>
            <div id="datospersonalesContentId" class="collapse" role="tabpanel" aria-labelledby="datospersonalesHeaderId">
                <div class="card-body">
                    @include('pacientes.detalles.datospersonales', ['paciente' => $paciente])
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
                        @include('pacientes.detalles.historiaclinica.listar', 
                            ['titulo' => 'Medicamentos',
                                'clase'=>'medicamento', 'clasepaciente'=>'medicamentopaciente',
                            'pacienteid'=>$paciente->id, 'objetos'=>$paciente->medicamentos_paciente])  
                    </div>
                </div>
            </div>
        </div>
        @include('pacientes.detalles.historiaclinica.seccion',
            [ 'titulo' => 'Antecedentes patológicos',
            'clase'=>'antecedentepatologico', 'clasepaciente'=>'antecedentepatologicopaciente',
            'pacienteid'=>$paciente->id, 'objetos'=>$paciente->antecedentes_patologicos_paciente])
    </div>
        

@endsection


@section('script')
    <script src="{{ url('js/autocompletar.js') }}"></script>
    <script src="{{ url('js/agregaritem.js') }}"></script>
    <script src="{{ url('js/quitaritem.js') }}"></script>

    <script>
        $(document).ready(function(){
            autocompletar("#medicamento", "{{ route('administracion.clase.buscar', 'medicamento') }}");
            agregaritem("#nuevomedicamento", "#formnuevomedicamento", "{{ route('medicamentospacientes.agregar')}}", "#tablamedicamento");      
        });
    </script>
@endsection