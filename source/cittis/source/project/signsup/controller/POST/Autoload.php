<?php

class Autoload
{
    protected $connection;
    protected $generalConnection;

    //response array

    public function __construct($connection, $generalConnection)
    {
        $this->connection = $connection;
        $this->generalConnection = $generalConnection;
        self::initProcess();
    }

    protected function initProcess()
    {

        $content = array();

        switch (true) {
            case getRequest("add") && (getRequest("add") == "firebase"):
                if (self::addFirebaseUsers()) {

                    $content =
                        array(
                            'Complete' => "Datos Añadidos"
                        );
                }
                //self::addElements();
                break;
        }

        // Show Elements
        $response = array();
        $dataState = (int)(isset($content) && !empty($content));
        $response['success'] = $dataState;
        if (!$dataState) {
            $content = array('error' => 'No Actions');
        }
        $response['response'] = $content;//JsonHandler::decode(JsonHandler::encode($values, JSON_PRETTY_PRINT), true);
        showElements($response);
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

        if (self::addFirebaseUsers()) {
            return array(
                'success' => 1,
                'response' =>
                    array(
                        "data" => 'Usuario Añadido'
                    ),
            );
        }
    }

    protected function addFirebaseUsers()
    {
        $json = array();
        // Process Init
        //$values = self::getValuesPost();
        $values = $_POST["data"];

        $decodeJSON = JsonHandler::decode($values, true);
        if (isset($decodeJSON) && !empty($decodeJSON)) {
            $data = [];

            $values = JsonHandler::decode($decodeJSON, true);
            $values = $values["DataUser"];


            $data["idFirebase"] = $values["firebase_id"];
            $data["idEmail"] = $values["firebase_email"];

            $checkUser = ($values["firebase_auth"] == 1);
            $data["temp"] = (int)!$checkUser;
            $data["isUser"] = (int)$checkUser;

            $values["DataUser"] = $data;

            $sql = QueriesDAO::addDataFirebase($values, "DataUser");

            // Reset
            $data = [];
            return (!self::getGeneralConnection()->db_exec('query', $sql));// {
            //$json['success'] = (int)true;
            //$data['data'] = 'Complete';
            /*
        }else{
            $json['error'] = (int) true;
            $data['data'] = 'Error SQL '.$sql;
        }
        $json["response"] = $data;
        return $json;*/
        } else {
            return null;
        }


    }

    protected function getValuesPost($key = "data", $keyTwo = "data")
    {
        $values = $_POST[$key];

        $decodeJSON = JsonHandler::decode($values, true);
        // Convert JSON string to Array
        $decodeJSON = JsonHandler::decode($decodeJSON, true);
        //$values = $decodeJSON[$keyTwo];
        //$decodeJSON = JsonHandler::decode($values, true);
        // Dump all data of the Array
        return ($decodeJSON);
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
