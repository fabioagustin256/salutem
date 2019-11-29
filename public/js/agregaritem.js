function agregaritem(nuevoitem, formulario, ruta, tabla){
    $(formulario).submit(function(e){
        e.preventDefault();
        $.ajax({
            url: ruta, 
            type: "POST",
            data: $(this).serialize(),
            success: function(data){
                $(tabla).html(data);
                $(nuevoitem).reload();
                $(nuevoitem).collapse('toggle');

            },
            error: function(data){
                console.log(data);
            }
        });
    });
}