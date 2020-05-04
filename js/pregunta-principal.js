$(document).on('click', '.face-ico-principal', function() {

    var respuesta = $(this).attr('name');   
    
    guardar_respuesta(respuesta);
});

function guardar_respuesta(respuesta) {
    $.ajax({
            url: 'php/guardar-respuesta.php',
            type: 'POST',
            dataType: 'html',
            data: { respuesta, respuesta }

        })
        .done(function(respuesta) {
            console.log(respuesta);
            
            // $("#pregunta").html(respuesta);
            
        })
        .fail(function() {
            console.log("error");
        });
}