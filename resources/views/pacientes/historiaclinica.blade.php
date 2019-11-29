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
        @include('pacientes.detalles.historiaclinica.seccion1',
        [ 'titulo' => 'Alergias', 'nombrecampo'=>'Alergia',
        'clase'=>'alergia', 'clasepaciente'=>'alergiapaciente',
        'pacienteid'=>$paciente->id, 'objetos'=>$paciente->alergias_paciente])





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
                        @include('pacientes.detalles.historiaclinica.listar1', 
                            ['titulo' => 'Medicamentos', 'nombrecampo'=>'Medicamento',
                                'clase'=>'medicamento', 'clasepaciente'=>'medicamentopaciente',
                            'pacienteid'=>$paciente->id, 'objetos'=>$paciente->medicamentos_paciente])  
                    </div>
                </div>
            </div>
        </div>
        @include('pacientes.detalles.historiaclinica.seccion1',
            [ 'titulo' => 'Antecedentes patológicos', 'nombrecampo'=>'Antecedente patológico',
            'clase'=>'antecedentepatologico', 'clasepaciente'=>'antecedentepatologicopaciente',
            'pacienteid'=>$paciente->id, 'objetos'=>$paciente->antecedentes_patologicos_paciente])
    </div>
        

@endsection


@section('script')
    <script src="{{ url('js/autocompletar.js') }}"></script>
    <script src="{{ url('js/agregaritem.js') }}"></script>
    <script src="{{ url('js/quitaritem.js') }}"></script>
    <script src="{{ url('js/filtrar.js') }}"></script>

    <script>
        $(document).ready(function(){
            autocompletar("#alergia", "{{ route('administracion.clase.buscar', 'alergia') }}");
            filtrar("{{ route('historiaclinica.clase.filtrar', 'alergia') }}", "#buscaralergia", "#formularioalergia");
            agregaritem("#nuevoalergia", "#formnuevoalergia", "{{ route('historiaclinica.clase.agregar', array($paciente->id, 'alergia') )}}", "#tablaalergia");      


            autocompletar("#medicamento", "{{ route('administracion.clase.buscar', 'medicamento') }}");
            filtrar("{{ route('historiaclinica.clase.filtrar', 'medicamento') }}", "#buscarmedicamento", "#formulariomedicamento");
            agregaritem("#nuevomedicamento", "#formnuevomedicamento", "{{ route('historiaclinica.clase.agregar', array($paciente->id, 'medicamento') )}}", "#tablamedicamento");      
            
            autocompletar("#antecedentepatologico", "{{ route('administracion.clase.buscar', 'antecedentepatologico') }}");
            filtrar("{{ route('historiaclinica.clase.filtrar', 'antecedentepatologico') }}", "#buscarantecedentepatologico", "#formularioantecedentepatologico");
            agregaritem("#nuevoantecedentepatologico", "#formnuevoantecedentepatologico", "{{ route('historiaclinica.clase.agregar', array($paciente->id, 'antecedentepatologico') )}}", "#tablaantecedentepatologico"); 
        });
    </script>
@endsection