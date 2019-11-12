<p>
    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        Filtrar
    </a>
    <button type="button" class="btn btn-success" onclick="resetearfiltrospersonas('{{ route('resetearfiltrospersonas') }}', '#tablapersonas')">
        Mostrar todo
    </button>
</p>
<div class="collapse" id="collapseExample">    
    <form method="POST" id="filtrospersonas">
        @csrf

        @include('formularios.elegirlocalidad')

        <button type="submit" class="btn btn-success">Listar</button>
    </form> 
</div>