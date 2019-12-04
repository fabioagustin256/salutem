function elegirciudad(ruta, ruta2, campo){
    console.log(valor2);
    $.ajax({
        url: ruta,
        type: "GET",
        success: function(data){
            var texto = '<option value="">Seleccione una provincia</option>';                    
            for(var i=0; i<data.length;i++){
                texto += '<option value="' + data[i].id + '">' + data[i].nombre + '</option>';                            
            }            
            $('#provincia').html(texto);                  
        }, 
        error: function(data){
            console.log(data);
        }
    });

    $("#provincia").change(function(){
        var provincia = $(this).val();  
        if (provincia){ 
            var ruta = ruta2 + provincia;
            $.ajax({
                url: ruta,
                type: "GET",
                dataType: "json",
                success: function(data){
                    var texto2 = '<option value="">Seleccione una ciudad</option>';                    
                    for(var i=0; i<data.length;i++){
                        texto2 += '<option value="' + data[i].id + '">' + data[i].nombre + '</option>';                            
                    }
                    $('#ciudad').html(texto2);
                    
                },
                error: function(data){
                    console.log(data);
                }                
            });
        } else {
            $('#ciudad').html('<option value="">Seleccione primero una provincia</option>');
        }       
    });
};