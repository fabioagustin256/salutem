<div class="form-group row">
    <label for="{{ $campo }}" class="col-sm-1 col-form-label"> {{ ucfirst($campo) }}</label>
    <div class="col-sm-11">
        <input type="text" class="form-control" id="{{ $campo }}" name="{{ $campo }}" 
            @isset($editar) value="{{ $editar }}"  @endisset
        >
    </div>

    <input type="hidden" id="{{ $campo }}id" name="{{ $campo }}id"
        @isset($editarid) value="{{ $editarid }}"  @endisset
    >
</div>