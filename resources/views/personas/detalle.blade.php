@extends('plantilla')

@section('contenido')
    <a class="btn btn-primary float-right" href="{{ route('personas.index') }}" role="button">Volver al listado</a>

    <br><br>

    <div id="accordianId" role="tablist" aria-multiselectable="true">
        <div class="card">
            <div class="card-header" role="tab" id="section1HeaderId">
                <h5 class="mb-0">
                    <a data-toggle="collapse" data-parent="#accordianId" href="#section1ContentId" aria-expanded="true" aria-controls="section1ContentId">
                    Datos personales
                    </a>
                </h5>
            </div>
                <div id="section1ContentId" class="collapse show" role="tabpanel" aria-labelledby="section1HeaderId">
                    <div class="card-body">
                        @include('formularios.detallepersona', ['persona' => $persona])
                    </div>
                </div>
            </div>
        </div>
    </div> 
@endsection