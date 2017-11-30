<?php

class CiudadAPI {

    /*** obtiene persona  **/
    function getAleatorios() {
        if ($_GET['action'] == 'aleatorio') {
             if (isset($_GET['id'])) {//muestra 1 solo registro si es que existiera ID                 
                 $aleatorio=rand(2, $_GET['id']);
                 $response = array("ingresado" => $_GET['id'],"aleatorio" => $aleatorio,);
                 echo json_encode($response, JSON_PRETTY_PRINT);
            } else { //muestra todos los registros                   
                 $response=array( "ingresado" => "10",  "aleatorio" => 5,);
                //$response = $db->getCiudades();
                echo json_encode($response, JSON_PRETTY_PRINT);
            }
        } else {
            
            $this->response(400);
        }
    }

    
    
    
    function response($code = 200, $status = "", $message = "") {
        http_response_code($code);
        if (!empty($status) && !empty($message)) {
            $response = array("status" => $status, "message" => $message);
            echo json_encode($response, JSON_PRETTY_PRINT);
        }
    }

    public function API() {
        header('Content-Type: application/JSON');
        $method = $_SERVER['REQUEST_METHOD'];
        switch ($method) {
            case 'GET'://consulta
                $this->getAleatorios();
                break;
            case 'POST'://inserta
                $this->saveCiudad();
                break;
            default://metodo NO soportado
                $this->response(405);
                break;
        }
    }

    /**
     * Respuesta al cliente
     * @param int $code Codigo de respuesta HTTP
     * @param String $status indica el estado de la respuesta puede ser "success" o "error"
     * @param String $message Descripcion de lo ocurrido
     */
}

//end class
