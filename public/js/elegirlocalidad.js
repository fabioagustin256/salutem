function elegirlocalidad(ruta, ruta2, campo){
    $.ajax({
        url: ruta,
        type: "GET",
        success: function(data){
            var texto = '<option value="">Seleccione un departamento</option>';                    
            for(var i=0; i<data.length;i++){
                texto += '<option value="' + data[i].id + '">' + data[i].nombre + '</option>';                            
            }
            $('#departamento').html(texto);                        
        }, 
        error: function(data){
            console.log(data);
        }
    });

    $("#departamento").change(function(){
        var departamento = $(this).val();  
        if (departamento){ 
            var ruta = ruta2 + departamento;
            $.ajax({
                url: ruta,
                type: "GET",
                dataType: "json",
                success: function(data){
                    var texto2 = '<option value="">Seleccione una localidad</option>';                    
                    for(var i=0; i<data.length;i++){
                        texto2 += '<option value="' + data[i].id + '">' + data[i].nombre + '</option>';                            
                    }
                    $('#loc').html(texto2);
                },

            });
        } else {
            $('#loc').html('<option value="">Seleccione primero un departamento</option>');
        }       
    });
};