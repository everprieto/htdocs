
<!DOCTYPE html>
<html>
    <head>
        <title>Principal Rest</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>   
        <script src="js/jquery-1.11.2.min.js"></script>

    </head>
    <body>
        <div>
            <?php
            require_once "cliente.php";
            /*             * OBTENER TOTAL DE CIUDADES * */
            $resultado = $new->sendGet();
            $ciudadesb = json_decode($resultado);
            var_dump($resultado);
            echo '</BR>';
            echo "<ul>";
            echo '</BR>';
            echo "<select class=\"form-control\" name=\"cars\">";
            foreach ($ciudadesb as $ciudad) {
                echo "<option value=\"" . $ciudad->id . "\"> " . $ciudad->id . " - " . $ciudad->name . " " . "</option>";
            }
            echo "</select>";

            /*             * OBTENER TOTAL DE CIUDADES POR ID* */
       /*     $resultado = $new->sendGetbyId(2);
            $ciudadesb = json_decode($resultado);
            //var_dump($resultado);
            echo '</BR>';
            echo "<select class=\"form-control\" name=\"cars\">";
            foreach ($ciudadesb as $ciudad) {
                echo "<option value=\"" . $ciudad->id . "\"> " . $ciudad->id . " - " . $ciudad->name . " " . "</option>";
            }
            echo "</select>";*/
            ?>


        </div>
        <div><p></p></div>
        <div class="container"> 
            <a href="view_reg_Ciudad.php" class="btn btn-info" role="button">Agregar Ciudad</a>
        </div>


    </body>
</html>