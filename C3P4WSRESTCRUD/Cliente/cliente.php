<?php

class CurlRequest {

    public function sendPost($noCiu) {
        //datos a enviar
        $data = array('name' => $noCiu);
        //url contra la que atacamos
        $ch = curl_init("http://localhost:8080/C3P4WSRESTCRUD/servicio/ciudades");
        //a true, obtendremos una respuesta de la url, en otro caso, 
        //true si es correcto, false si no lo es
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //establecemos el verbo http que queremos utilizar para la petición
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        //enviamos el array data
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
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

    public function sendPut() {
        //datos a enviar
        $id = '2';
        $data = array('name' => 'test');
        //url contra la que atacamos
        $ch = curl_init("http://localhost:8080/C3P4WSRESTCRUD/servicio/ciudades/" . $id . "/");
        //a true, obtendremos una respuesta de la url, en otro caso, 
        //true si es correcto, false si no lo es
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //establecemos el verbo http que queremos utilizar para la petición
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        //enviamos el array data
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        //obtenemos la respuesta
        $response = curl_exec($ch);
        // Se cierra el recurso CURL y se liberan los recursos del sistema
        curl_close($ch);
        if (!$response) {
            return false;
        } else {
            var_dump($response);
        }
    }

    public function sendGet() {   //datos a enviar
        $data = array();
        //url contra la que atacamos
        $ch = curl_init("http://localhost:8080/C3P4WSRESTCRUD/servicio/ciudades");
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

    public function sendGetbyId($id) {   //datos a enviar
        $data = array();
        //url contra la que atacamos
        $ch = curl_init("http://localhost:8080/C3P4WSRESTCRUD/servicio/ciudades/" . $id . "/");
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

    public function sendDelete() {
        //datos a enviar
        $id = '5';
        $data = array();
        //url contra la que atacamos
        $ch = curl_init("http://localhost:8080/C3P4WSRESTCRUD/servicio/ciudades/" . $id . "/");
        //a true, obtendremos una respuesta de la url, en otro caso, 
        //true si es correcto, false si no lo es
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //establecemos el verbo http que queremos utilizar para la petición
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        //enviamos el array data
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        //obtenemos la respuesta
        $response = curl_exec($ch);
        // Se cierra el recurso CURL y se liberan los recursos del sistema
        curl_close($ch);
        if (!$response) {
            return false;
        } else {
            var_dump($response);
        }
    }

}

$new = new CurlRequest();
?>

