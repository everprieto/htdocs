<?php
require_once "cliente.php";
//$client = new nusoap_client("http://localhost:8082/C2P4WSCRUD/Servicio/Servicio.php?wsdl", 'wsdl');
$city = $_POST['city'];
/* * INSERTAR CIUDADES * */
$resultado = $new->sendPost($city);
$ciudadesc = json_decode($resultado);
//var_dump($ciudadesc);
echo "<ul>";
echo "<li>" .$ciudadesc->message. " " . "</li>";
/*foreach ($ciudadesc as $ciudadarr=> $ciudad_value) {
    echo "<li>" .$ciudadarr."-". $ciudad_value . " " . "</li>";
}*/
echo "</ul>";
?>