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

        @include('pacientes.detalles.historiaclinica.seccion1',
        [ 'titulo' => 'Antecedentes familiares', 'nombrecampo'=>'Ant. familiar',
        'clase'=>'antecedentefamiliar', 'clasepaciente'=>'antecedentefamiliarpaciente',
        'pacienteid'=>$paciente->id, 'objetos'=>$paciente->antecedentes_familiares_paciente])

        @include('pacientes.detalles.historiaclinica.seccion1',
        [ 'titulo' => 'Antecedentes patológicos', 'nombrecampo'=>'Ant. patológico',
        'clase'=>'antecedentepatologico', 'clasepaciente'=>'antecedentepatologicopaciente',
        'pacienteid'=>$paciente->id, 'objetos'=>$paciente->antecedentes_patologicos_paciente])

        @include('pacientes.detalles.historiaclinica.seccion1',
        [ 'titulo' => 'Antecedentes quirúrgicos', 'nombrecampo'=>'Ant.quirúrgico',
        'clase'=>'antecedentequirurgico', 'clasepaciente'=>'antecedentequirurgicopaciente',
        'pacienteid'=>$paciente->id, 'objetos'=>$paciente->antecedentes_quirurgicos_paciente])

        @include('pacientes.detalles.historiaclinica.seccion1',
        [ 'titulo' => 'Hábitos tóxicos', 'nombrecampo'=>'Hábito toxico',
        'clase'=>'habitotoxico', 'clasepaciente'=>'habitotoxicopaciente',
        'pacienteid'=>$paciente->id, 'objetos'=>$paciente->habitos_toxicos_paciente])

        @include('pacientes.detalles.historiaclinica.seccion1',
        [ 'titulo' => 'Medicamentos', 'nombrecampo'=>'Medicamento',
        'clase'=>'medicamento', 'clasepaciente'=>'medicamentopaciente',
        'pacienteid'=>$paciente->id, 'objetos'=>$paciente->medicamentos_paciente])

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

            autocompletar("#antecedentefamiliar", "{{ route('administracion.clase.buscar', 'antecedentefamiliar') }}");
            filtrar("{{ route('historiaclinica.clase.filtrar', 'antecedentefamiliar') }}", "#buscarantecedentefamiliar", "#formularioantecedentefamiliar");
            agregaritem("#nuevoantecedentefamiliar", "#formnuevoantecedentefamiliar", "{{ route('historiaclinica.clase.agregar', array($paciente->id, 'antecedentefamiliar') )}}", "#tablaantecedentefamiliar");

            autocompletar("#antecedentepatologico", "{{ route('administracion.clase.buscar', 'antecedentepatologico') }}");
            filtrar("{{ route('historiaclinica.clase.filtrar', 'antecedentepatologico') }}", "#buscarantecedentepatologico", "#formularioantecedentepatologico");
            agregaritem("#nuevoantecedentepatologico", "#formnuevoantecedentepatologico", "{{ route('historiaclinica.clase.agregar', array($paciente->id, 'antecedentepatologico') )}}", "#tablaantecedentepatologico");

            autocompletar("#antecedentequirurgico", "{{ route('administracion.clase.buscar', 'antecedentequirurgico') }}");
            filtrar("{{ route('historiaclinica.clase.filtrar', 'antecedentequirurgico') }}", "#buscarantecedentequirurgico", "#formularioantecedentequirurgico");
            agregaritem("#nuevoantecedentequirurgico", "#formnuevoantecedentequirurgico", "{{ route('historiaclinica.clase.agregar', array($paciente->id, 'antecedentequirurgico') )}}", "#tablaantecedentequirurgico");

            autocompletar("#habitotoxico", "{{ route('administracion.clase.buscar', 'habitotoxico') }}");
            filtrar("{{ route('historiaclinica.clase.filtrar', 'habitotoxico') }}", "#buscarhabitotoxico", "#formulariohabitotoxico");
            agregaritem("#nuevohabitotoxico", "#formnuevohabitotoxico", "{{ route('historiaclinica.clase.agregar', array($paciente->id, 'habitotoxico') )}}", "#tablahabitotoxico");

            autocompletar("#medicamento", "{{ route('administracion.clase.buscar', 'medicamento') }}");
            filtrar("{{ route('historiaclinica.clase.filtrar', 'medicamento') }}", "#buscarmedicamento", "#formulariomedicamento");
            agregaritem("#nuevomedicamento", "#formnuevomedicamento", "{{ route('historiaclinica.clase.agregar', array($paciente->id, 'medicamento') )}}", "#tablamedicamento");
        });
    </script>
@endsection