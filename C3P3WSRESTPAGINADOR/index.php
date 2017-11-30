<!DOCTYPE html>
<html>
    <head>
        <title>Paginacion en PHP</title>
        <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
        <style type="text/css">
            .active > a{
                background: rgb(255,116,0); 
            }
            ul{
                margin-left: 0px;
                padding: 0px;
            } 
            ul > li{
                list-style: none;
                display: inline-block;
                margin-right:7px;
            }
            ul > li > a {
                color: #FFFFFF;
                text-decoration: none;
                padding: 5px 10px 5px 10px;
                display: block;
                background: #1e5799; /* Old browsers */
                border-radius: 20px;
            }
            .btn > a{
                padding: 2px;
                background: #1e5799; /* Old browsers */
                border-radius: 2px;
                text-align: center;
                width:30px;
            }
            table{
                border: solid 1px #7E7C7C;
                border-collapse: collapse;
            }
            td , th{
                border: solid 1px #7E7C7C;
                padding: 2px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <!--    <form name="formulario" method="get" action="index.php">
        Cantidad Datos a mostrar: <input type="number" name="datos"   >
        <input type="submit" value="Mostrar"/>-->


    </form>



    <?php
   require_once 'wscliente.php';
   //$final=5;
    echo 'Respesta rest = ' . $final;
    echo '<br />';
    $CantidadMostrar = $final;
    require_once 'paginador.php';
    ?>
</body>
</html>