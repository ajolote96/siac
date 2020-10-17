<html>
    <head>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    </head>
    <body>
       <select  id="numeros">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
       </select>

        <input type="text" id="textbox">
       <script type="text/javascript">
        $(function(){

            $("#numeros").change(function () { 
                var valorSeleccionado = $(this).children(":selected").text();
                $("#textbox").show();
            });

        });
       </script>

           

        </script>
    </body>
</html>