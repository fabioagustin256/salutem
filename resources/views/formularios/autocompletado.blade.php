<div class="form-group row">
    <label for="{{ $campo }}" class="col-sm-2 col-form-label"> {{ ucfirst($nombrecampo) }}</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="{{ $campo }}" name="{{ $campo }}" 
            @isset($editar) value="{{ $editar }}"  @endisset
        >
    </div>

    <input type="hidden" id="{{ $campo }}id" name="{{ $campo }}id"
        @isset($editarid) value="{{ $editarid }}"  @endisset
    >
</div>