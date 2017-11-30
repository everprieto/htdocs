<?php

require_once 'CiudadDB.php';

class CiudadAPI {

    /*** obtiene persona  **/
    function getCiudadess() {
        if ($_GET['action'] == 'ciudades') {
            $db = new CiudadDB();
            if (isset($_GET['id'])) {//muestra 1 solo registro si es que existiera ID                 
                $response = $db->getCiudad($_GET['id']);
                echo json_encode($response, JSON_PRETTY_PRINT);
            } else { //muestra todos los registros                   
                $response = $db->getCiudades();
                echo json_encode($response, JSON_PRETTY_PRINT);
            }
        } else {
            $this->response(400);
        }
    }

    /*** elimina persona  **/
    function deleteCiudad() {
        if (isset($_GET['action']) && isset($_GET['id'])) {
            if ($_GET['action'] == 'ciudades') {
                $db = new CiudadDB();
                $db->delete($_GET['id']);
                $this->response(200, "success", "Registro eliminado id ".$_GET['id']);
                exit;
            }
        } else {
        $this->response(400);
        }
    }

    /*** Actualiza un recurso */
    function updateCiudad() {
        if (isset($_GET['action']) && isset($_GET['id'])) {
            if ($_GET['action'] == 'ciudades') {
                $obj = json_decode(file_get_contents('php://input'));
                $objArr = (array) $obj;
                if (empty($objArr)) {
                    $this->response(422, "error", "Nothing to add. Check json");
                } else if (isset($obj->name)) {
                    $db = new CiudadDB();
                    $db->update($_GET['id'], $obj->name);
                    $this->response(200, "success", "Registro actualizado ".$_GET['id']);
                } else {
                    $this->response(422, "error", "The property is not defined");
                }
                exit;
            }
        }
        $this->response(400);
    }

    /*** metodo para guardar un nuevo registro de persona en la base de datos */
    function saveCiudad() {
        if ($_GET['action'] == 'ciudades') {
            //Decodifica un string de JSON
            $obj = json_decode(file_get_contents('php://input'));
            $objArr = (array) $obj;
            if (empty($objArr)) {
                $this->response(422, "error", "Nothing to add. Check json");
            } else if (isset($obj->name)) {
                $ciudad = new CiudadDB();
                $ciudad->insert($obj->name);
                $this->response(200, "success", "Nuevo registro añadido exitosamente");
            } else {
                $this->response(422, "error", "The property is not defined");
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
                $this->getCiudadess();
                break;
            case 'POST'://inserta
                $this->saveCiudad();
                break;
            case 'PUT'://actualiza
                $this->updateCiudad();
                break;
            case 'DELETE'://elimina
                $this->deleteCiudad();
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
