@extends('plantilla')

@section('contenido')
    <a class="btn btn-primary float-right" href="{{ route('pacientes.index') }}" role="button">Volver al listado</a>

    <br><br>

    <div id="accordianId" role="tablist" aria-multiselectable="true">
        <div class="card">
            <div class="card-header" role="tab" id="section1HeaderId">
                <h5 class="mb-0">
                    <a data-toggle="collapse" data-parent="#accordianId" href="#section1ContentId" aria-expanded="true" aria-controls="section1ContentId">
                    Datos del paciente
                    </a>
                </h5>
            </div>
                <div id="section1ContentId" class="collapse show" role="tabpanel" aria-labelledby="section1HeaderId">
                    <div class="card-body">
                        @include('pacientes.detalles.datospersonales', ['paciente' => $paciente])
                    </div>
                </div>
            </div>
        </div>
    </div> 
@endsection