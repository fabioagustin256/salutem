function agregaritem(nuevoitem, formulario, ruta, tabla){
    $(formulario).submit(function(e){
        e.preventDefault();
        $.ajax({
            url: ruta, 
            type: "POST",
            data: $(this).serialize(),
            success: function(data){
                $(tabla).html(data);                
                $(nuevoitem).collapse('toggle');
                $(formulario)[0].reset();

            },
            error: function(data){
                console.log(data);
            }
        });
    });
}