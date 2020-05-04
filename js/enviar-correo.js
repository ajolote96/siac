
$('#btn-casa').click(function () { 
    var data = $('#casa').serializeArray();
    data.push({name: 'lugar', value: 'casa'});
    alert(data);

    $.ajax({
        type: "POST",
        url: "php/enviar.php",
        data: $.param(data),
        
        success: function (response) {
            console.log(response);
        }
    });

});




$('#btn-negocio').click(function () { 
    var data = $('#negocio').serializeArray();
    data.push({name: 'lugar', value: 'negocio'});

    $.ajax({
        type: "POST",
        url: "php/enviar.php",
        data: $.param(data),
        
        success: function (response) {
            console.log(response);
        }
    });

});


$('#btn-industria').click(function () { 
    
    var data = $('#industria').serializeArray();
    data.push({name: "lugar", value: 'industria'});

    $.ajax({
        type: "POST",
        url: "php/enviar.php",
        data: $.param(data),
        
        success: function (response) {
            console.log(response);
        }
    });

});

// $("form").on('submit', function () { 
      
//     var nombre = $(this).attr('name');
//     var frm = $(this);
//     $.ajax({
//         type: "POST",
//         url: "php/enviar.php",
//         data: frm.serialize(),
        
//         success: function (response) {
//             console.log(response);
//         }
//     });

// });