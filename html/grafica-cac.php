<?php
  session_start();
  require '../php/conexion.php';

  $query = "SELECT motivo, COUNT(motivo) as motivoContador FROM motivos WHERE cac='paradero' GROUP BY motivo";
  $resultado = $conexion->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


<body>
    <figure class="highcharts-figure">
        <div id="container"></div>        
      </figure>
</body>

<script>// Build the chart
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
    name: 'Motivos',
    data: [

      <?php 
      while($fila = $resultado->fetch_assoc()){
        echo "['".$fila['motivo']."', ".$fila['motivoContador']." ],";
      }  
        
      ?>    
    ]
  }]
});

</script>
</html>