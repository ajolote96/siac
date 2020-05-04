//Carga una pregunta la primer vez que se abre

$(cargar_pregunta());
/*$(document).on('click', '.face-ico-principal', function() {

    cargar_pregunta();
});
*/
function cargar_pregunta() {
    $.ajax({
            url: 'php/index.php',
            type: 'POST',
            dataType: 'html'

        })
        .done(function(respuesta) {
            console.log(respuesta);
            if(respuesta=='exit'){
                 $('header').hide();
                $('main').hide();
                $('footer').hide();
                $('#encuesta').hide();
                $("body").css("background-image", "url(img/gracias.png)");
                $('.thanks').slideDown('slow');                
               
                setTimeout(function() {
                    $('.thanks').slideUp('slow');                                       
                }, 2000);

                setTimeout(function(){
                location = '../banner.html';
                }, 2500);
            }
            else{
                $("#pregunta").html(respuesta);
            }
        })

        .fail(function() {
            console.log("error");
        });
}

//Envía al archivo guardar_reacción la reacción 
function guardar_respuesta_great(reaccion) {
    $.ajax({
            url: 'php/guardar_reaccion.php',
            type: 'POST',
            dataType: 'html',
            data: { reaccion, reaccion },

        })
        // .done(function(respuesta) {
        //     $("#pregunta").html(respuesta);
        // })
        // .fail(function() {
        //     console.log("error");
        // });
}

//Cambia la pregunta cuando se hace un click en cualquier icono/emoji
$(document).on('click', '.face-ico', function() {

    cargar_pregunta();
});


//Manda los datos del icono/emoji que fue pulsado
$(document).on('click', '#great', function() {

    var reaccion = "great";
    guardar_respuesta_great(reaccion);
});

$(document).on('click', '#good', function() {

    var reaccion = "good";
    guardar_respuesta_great(reaccion);
});

$(document).on('click', '#ok', function() {

    var reaccion = "ok";
    guardar_respuesta_great(reaccion);
});

$(document).on('click', '#bad', function() {

    var reaccion = "bad";
    guardar_respuesta_great(reaccion);
});


function imprimir_datos() {
    $.ajax({
            url: 'php/evaluar-ejecutivos.php',
            type: 'POST',
            dataType: 'html',

        })
        .done(function(respuesta) {
            $("#datos").html(respuesta);
        })
        .fail(function() {
            console.log("error");
        });
}


$(document).on('click', '#evaluar-ejecutivos', function() {

    imprimir_datos();
    // var valor = $(this).val();
    // if (valor != "") {
    //     imprimir_datos(valor);
    // } else {
    //     imprimir_datos();
    // }
});