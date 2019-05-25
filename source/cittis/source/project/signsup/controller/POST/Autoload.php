<?php

class Autoload
{
    protected $connection;
    protected $generalConnection;

    //response array
    protected $response = array();

    public function __construct($connection, $generalConnection)
    {
        $this->connection = $connection;
        $this->generalConnection = $generalConnection;
        self::initProcess();
    }

    protected function initProcess()
    {
        $json = array();
        switch (true) {
            case getRequest("add"):
                $json = self::addElements();
                break;
            default:

                $data = array();
                $json['success'] = (int)false;
                $data['data'] = 'No se puede añadir la señal';
                $json["response"] = $data;
                break;
        }

        $dataState = (isset($json) || empty($json));
        if (!$dataState) {
            $json['error'] = (!$dataState);
        }
        showElements($json);
    }

    protected function addElements()
    {
        switch (getRequest("add")) {
            case 'signal':
                // $content = self::initProcessSignal();
                break;
            case 'firebase':
                return self::addFirebaseUser();
                break;
        }
    }

    protected function initProcessSignal()
    {
        require_once 'DbOperation.php';
        $db = new DbOperation(self::getConnection(), self::getGeneralConnection());
        if ($db->createSignals(getRequest("signal"))) {
            $this->response['error'] = false;
            $this->response['response'] = 'Señal añadida';
        } else {
            $this->response['error'] = true;
            $this->response['response'] = 'No se puede añadir la señal';
        }
    }

    protected function addFirebaseUser()
    {
        $json = array();
        $json['success'] = (int)true;
        $data['data'] = 'Complete';
        $json["response"] = $data;
        // Process Init
        $values = self::getValuesPost();
        if (isset($values) && !empty($values)) {

            $sql = QueriesDAO::addDataFirebase($values);
            return $json;
        } else {
            return null;
        }


    }

    protected function getValuesPost($key = "data", $keyTwo = "data")
    {
        $values = $_POST[$key];
        $decodeJSON = JsonHandler::decode($values, true);

        // Convert JSON string to Array
        $values = "{" . $decodeJSON[$keyTwo] . "}";
        $someArray = JsonHandler::decode($values, true);
        // Dump all data of the Array
        return ($someArray);
    }

    protected function getConnection()
    {
        return $this->connection;
    }

    protected function getGeneralConnection()
    {
        return $this->generalConnection;
    }

}

new Autoload(self::getConnection(), self::getGeneralConnection());
