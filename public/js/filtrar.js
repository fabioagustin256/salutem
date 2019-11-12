function filtrar(ruta, filtros, tabla){                
    $(filtros).submit(function(e){
        e.preventDefault();
        $.ajax({
            url: ruta, 
            type: 'POST',
            data: $(this).serialize(),
            success: function(data){
                $(tabla).html(data);
            },
            error: function(data){
                console.log(data);
            }
        });
    });
}