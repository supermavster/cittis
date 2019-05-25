<?php

require_once 'CittisImages.php';
require_once 'Signal.php';

class Autoload
{
    protected $connection;
    protected $generalConnection;

    public function __construct($connection, $generalConnection)
    {
        $this->connection = $connection;
        $this->generalConnection = $generalConnection;
        self::initProcess();
    }

    protected function initProcess()
    {
        $content = "";
        switch (true) {
            case getRequest('checkUser'):
                $content = self::getCheckUser();
                break;
            // Get Data Basic
            case getRequest("departments"):
            case getRequest("departamentos"):
                $content = self::getDepartments();
                break;
            case getRequest("municipalities"):
            case getRequest("municipios"):
                $content = self::getMunicipalities();
                break;
            case getRequest('count'):
                $content = self::getCount();
                break;
            case getRequest("maxID"):
                $content = self::getMaxID();
                break;
            // Get Data - Image Signal
            case getRequest("signal"):
                $content = self::getSignal();
                break;
            // Upload Elements
            case getRequest('uploadAll'):
                $content = self::uploadAllSignals();
                break;
            case getRequest('upload'):
                $content = self::uploadSignal();
                break;
        }

        $response = array();
        $dataState = (isset($content) || empty($content));
        if (!$dataState) {
            $response['error'] = (!$dataState);
        }
        $response['success'] = (int)$dataState;
        $values['data'] = $content;
        $response['response'] = JsonHandler::decode(JsonHandler::encode($values, JSON_PRETTY_PRINT), true);

        showElements($response);
    }

    protected function getCheckUser()
    {
        if ((getRequest("idUserFirebase"))) {
            // Values TEMP
            $idUserFirebase = getRequest("idUserFirebase");
            $sql = QueriesDAO::checkUserFirebase($idUserFirebase);
            $value = self::getGeneralConnection()->db_exec('value', $sql);
            return $value;
        }
    }

    protected function getDepartments()
    {
        $tempValues = array();
        switch (true) {
            case getRequest("departments"):
                $name = getRequest("departments");
                break;
            case getRequest("departamentos"):
                $name = getRequest("departamentos");
                break;
            default:
                $name = "all";
                breaK;
        }

        if (getRequest('idFirebase')) {
            $idFirebase = getRequest('idFirebase');
            $tempElements = self::getGeneralConnection()->db_exec('fetch_array', QueriesDAO::getRulesNameDepartmentsByUser($idFirebase, $name));
        } else {
            $tempElements = self::getGeneralConnection()->db_exec('fetch_array', MainQueriesDAO::getDepartments($name));
        }

        // Make Items (Array)
        foreach ($tempElements as $key => $value) {
            array_push($tempValues, $value['nameDepartment']);
        }
        return ($tempValues);
    }

    protected function getGeneralConnection()
    {
        return $this->generalConnection;
    }

    protected function getMunicipalities()
    {
        if (getRequest("municipalities")) {
            $name = getRequest("municipalities");
        } elseif (getRequest("municipios")) {
            $name = getRequest("municipios");
        } else {
            $name = "all";
        }

        $tempValues = array();
        if (getRequest('idFirebase')) {
            $idFirebase = getRequest('idFirebase');
            $tempElements = self::getGeneralConnection()->db_exec('fetch_array', QueriesDAO::getRulesNameMunicipalitiesByUser($idFirebase, $name));
        } else {
            $tempElements = self::getGeneralConnection()->db_exec('fetch_array', MainQueriesDAO::getMunicipalityByDepartment($name));
        }

        foreach ($tempElements as $key => $value) {
            array_push($tempValues, $value['nameMunicipality']);
        }
        return ($tempValues);
    }

    protected function getCount()
    {
        if ((getRequest("idUserFirebase"))) {

            // Values TEMP
            $idUserFirebase = getRequest("idUserFirebase");

            $sql = "";
            switch (getRequest("count")) {
                case 'Inventory':
                case 'Inventario':
                case 'inventario':
                case 'inventory':
                    $sql = QueriesDAO::getCountInventoryById($idUserFirebase);
                    break;
            }

            // Check Element
            $query = self::getGeneralConnection()->db_exec('fetch_row', $sql);
            if ((!isset($query) || empty($query)) || ($query == null)) {
                $tempValue = 1;
            } else {
                $tempValue = (int)$query[0];
            }
            //response array
            return $tempValue;
        } else {
            return null;
        }
    }

    protected function getMaxID()
    {
        $sql = "";
        if ((getRequest("idUserFirebase"))) {

            // Values TEMP
            $idUserFirebase = getRequest("idUserFirebase");
            switch (getRequest("maxID")) {
                case 'signal':
                case 'señal':
                    $sql = QueriesDAO::getMaxIDSignal($idUserFirebase);
                    break;
            }
            // Check Element
            $query = self::getGeneralConnection()->db_exec('fetch_row', $sql);
            if ((!isset($query) || empty($query)) || ($query == null)) {
                $tempValue = 1;
            } else {
                $tempValue = (int)$query[0];
            }
            //response array
            return $tempValue;
        } else {
            return null;
        }
    }

    protected function getSignal()
    {
        $signal = new Signal(self::getDataBase(), self::getGeneralConnection());
        $signal->getSignal(getRequest('signal'));
        return $signal->printValue();
    }

    protected function uploadAllSignals()
    {
        $signal = new Signal(self::getDataBase(), self::getGeneralConnection());
        return $signal->uploadAllSignals();
        //return $signal->printValue();
    }

    protected function uploadSignal()
    {
        $signal = new Signal(self::getDataBase(), self::getGeneralConnection());
        return $signal->uploadSignal();
        //return $signal->printValue();
    }

    /** Get Data Main **/
    protected function getDataBase()
    {
        return $this->connection;
    }

}

new Autoload(self::getConnection(), self::getGeneralConnection());
