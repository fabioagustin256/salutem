function autocompletar(campo, ruta){
    $(campo).autocomplete({            
        source: function(request, response){
            $.ajax({
                url: ruta,
                type: "get",
                data: {
                    term: request.term
                },
                success: function(data){
                    response(data);
                },
                error: function(data){
                    console.log(data);
                },
            });
        }, 
        minLength: 2,
        select: function(event, ui){
            $( campo ).val( ui.item.fila );
            $( campo + "id" ).val( ui.item.id );
            return false;
        }
    }).autocomplete( "instance" )._renderItem = function( ul, item ) {
        return $( "<li>" )
            .append( "<div>" + item.fila + "</div>" )
            .appendTo( ul );
    };       
};