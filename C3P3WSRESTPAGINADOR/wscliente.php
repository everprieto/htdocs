<?php

class CurlRequest {



    public function sendGetAleatorio($id) {   //datos a enviar
        $data = array();
        //url contra la que atacamos
        
        //Consumimos servicio php
        //$urlphp = curl_init("http://localhost:8081/C3P3WSRESTPAGINADOR/servicio/aleatorio/" . $id . "/");
        
        //Consimimos servicio .net
        $ch = curl_init("http://localhost:5003/api/Aleatorio/" . $id . "");
        //a true, obtendremos una respuesta de la url, en otro caso, 
        //true si es correcto, false si no lo es
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //establecemos el verbo http que queremos utilizar para la petición
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        //enviamos el array data
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        //obtenemos la respuesta
        $response = curl_exec($ch);

        // Se cierra el recurso CURL y se liberan los recursos del sistema
        curl_close($ch);
        if (!$response) {
            return false;
        } else {
            return $response;
        }
    }
    

}

 $new = new CurlRequest();
 $resultado = $new->sendGetAleatorio(10);
 $resultado = json_decode($resultado);
 //var_dump($resultado); 
 $final= $resultado->aleatorio;

   echo "<p>";
    echo "Resultado web service Aleatorio 1 al 10</br>";   
     echo $final;   
    echo "</p>";


?>

