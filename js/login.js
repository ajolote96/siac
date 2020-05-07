jQuery(document).on('submit', '#formlg', function(event) {
    event.preventDefault();
    jQuery.ajax({
            url: 'static/php/login.php',
            type: 'POST',
            dataType: 'json',
            data: $(this).serialize(),
            beforeSend: function() {
                $('.botonlg').val('Validando....');
            }
        })
        .done(function(respuesta) {
            console.log(respuesta);
            if (!respuesta.error) {
                if (respuesta.tipo == 'admin') {
                    location = 'admin.php';
                } else if(respuesta.tipo == 'matrix') {
                    location = 'matrix.html';
                } else{
                    location = 'banner.html';
                }
            } else {
                $('.error').slideDown('slow');
                setTimeout(function() {
                    $('.error').slideUp('slow');
                }, 3000);
                $('.botonlg').val('Ingresar');
            }
        })
        .fail(function(resp) {
            console.log(resp.responseText);
        })
        .always(function() {
            console.log("complete");
        });
});