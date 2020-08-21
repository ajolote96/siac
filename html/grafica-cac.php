<?php
  require '../php/conexion.php';  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
       .obtener-datos{
           margin-top: 5%;
       }

       .date{
           padding: 0;
           display: flex;
           justify-content: flex-start;
       }

       .date input{
           margin-right: 10%;
       }            
    </style>
  </head>


<body>    
  <div class="container obtener-datos">
      <form action="" method="POST" name="tablafrm" id="tablafrm">
          <div class="form-group" id="cac-seleccion">
              <select name="cac" id="cac" class="form-control" required>
                  <option value="" selected disabled>-- Elije el CAC --</option>
                  <option value="camichines">Camichines</option name="camichines">
                  <option value="paradero">Paradero</option name="paradero">
                  <option value="revolucion">Revolucion</option  name="revolucion">
                  <option value="santa fe">Santa fe</option name="santa fe">
                  <option value="tlaquepaque">Tlaquepaque</option name="tlaquepaque">
                  <option value="toluquilla">Toluquilla</option name="toluquilla">
                  <option value="tonala">Tonalá</option name="tonala">
              </select>
          </div>
          <div class="form-group date container">
              <div>
                  <label for="fecha-inicio">Inicio: </label>
                  <input type="date" name="fecha-inicio" id="fecha-inicio">
              </div>
            
              <div>
                  <label for="fecha-fin">Fin: </label>
                  <input type="date" name="fecha-fin" id="fecha-fin">
              </div>    
          </div>
          
          <input type="button" value="Mostrar Tabla" class="btn-lg btn-block btn-success" id="send-table">
          
      </form>
  </div>

  <div id="contenedor"></div>

  <figure class="highcharts-figure" style="display:none;">
      <div id="container"></div>        
  </figure>

</body>

<script>


$('#send-table').click(function(){
            $.ajax({
                type: "POST",
                url: "php/showChart.php",
                data: $('#tablafrm').serialize(),                
                success: function (response) {
                  
                    data = JSON.parse(response);

                    // $('#tablafrm').hide();
                    // $('#contenedor').html(response);
                    $('.highcharts-figure').show();

                    
                    //Build the chart
                            Highcharts.chart('container', {
                        chart: {
                            type: 'pie',
                            options3d: {
                            enabled: true,
                            alpha: 45,
                            beta: 0
                            }
                        },
                        title: {
                            text: 'Motivos de Visita'
                        },
                        accessibility: {
                            point: {
                            valueSuffix: '%'
                            }
                        },
                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.y}</b>'
                        },
                        plotOptions: {
                            pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            depth: 35,
                            dataLabels: {
                                enabled: true,
                                format: '{point.name}'
                            }
                            }
                        },
                        series: [{
                            type: 'pie',
                            name: 'Motivo',
                            data: data
                        }]
                        });
                   

                }
            });
        });



</script>
</html>