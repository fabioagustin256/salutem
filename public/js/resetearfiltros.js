function resetearfiltros(ruta, tabla){               
    $.ajax({
        url: ruta, 
        type: 'GET',
        success: function(data){
            $(tabla).html(data);
        },
        error: function(data){
            console.log(data);
        }
    });
}