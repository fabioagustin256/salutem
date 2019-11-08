@isset( $campo )
    @error($campo)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Debe ingresar {{ $campo }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @enderror
@endisset

@isset ( $mensaje )
    <div class="alert {{ $correcto ? 'alert-success': 'alert-danger' }} alert-dismissible fade show" role="alert">
        {{ $mensaje }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endisset
