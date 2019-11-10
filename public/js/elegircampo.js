function elegircampo(campo, ruta){
    var campo2 = campo.charAt(0).toUpperCase() + campo.substr(1).toLowerCase();
    $.ajax({
        url: ruta,
        type: "GET",
        success: function(data){                   
            var texto = '<select name="' + campo + '" id="' + campo + '" class="form-control">';
            texto += '<option value="">Seleccione una opción </option>';                    
            for(var i=0; i<data.length;i++){
                texto += '<option value="' + data[i].id + '">' + data[i].nombre + '</option>';                            
            }
            texto += '</select>';
            $('#' + campo ).html(texto);                        
        }
    });
};