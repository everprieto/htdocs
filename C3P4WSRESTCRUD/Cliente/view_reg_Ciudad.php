<!DOCTYPE html>

<html lang="en">
    <head>
        <title>pruebas</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>   
        <script src="js/jquery-1.11.2.min.js"></script>

        <?php
            require_once "cliente.php";
        ///**OBTENER TOTAL DE CIUDADES **/
        FUNCTION cargaCiudad() {
            $resultado = $new->sendGet();
            $ciudadesb = json_decode($resultado);
          //  $ciudadesb = array(1 => "Bogota", 2 => "Cali");

            echo "<select name=\"cars\">";
            foreach ($ciudadesb as $ciudad => $ciudad_value) {
                echo "<option value=\"" . $ciudad . "\"> " . $ciudad . " - " . $ciudad_value . " " . "</option>";
            }
            echo "</select>";
        }
        ?>

        <script>
            $(document).on('ready', function () {
                $('#btn-registrar').click(function () {
                    var url = "registraCiudad.php";

                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formulario").serialize(),
                        success: function (data)
                        {
                            $('#resp').html(data);
                            //location.href ="index.php";
                        }
                    });
                });
            });
        </script>
    </head>
    <body>
        <div class="page-header">
            <div class="container"> 
                <h1>Web Services <small>Agregar ciudades</small></h1>
            </div> 
        </div>

        <div class="container">
            <form method="post"  id="formulario">
                <div class="form-group">
                    <input type="text" class="form-control" name="city" placeholder="Ingrese Ciudad" autofocus/>
                    <input type="button" class="btn btn-primary" id="btn-registrar" value="Registrar Ciudad" />
                </div>

            </form>
            <div id="resp"></div>
        </div> 

        <div class="container"> 
            <a href="index.php" class="btn btn-info" role="button">Regresar</a>
        </div>

    </body>
</html>  