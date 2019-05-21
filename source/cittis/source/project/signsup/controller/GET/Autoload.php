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
        $response['error'] = !(isset($content) && !empty($content));
        $response['response'] = $content;
        showElements($response);
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
        if ((getRequest("idSignal")) && (getRequest("idProject"))) {

            // Values TEMP
            $idSignal = getRequest("idSignal");
            $idProject = getRequest("idProject");

            $sql = "";
            switch (getRequest("count")) {
                case 'Inventory':
                case 'Inventario':
                case 'inventario':
                case 'inventory':
                    $sql = QueriesDAO::getCountInventoryById($idSignal, $idProject);
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
        switch (getRequest("maxID")) {
            case 'signal':
            case 'señal':
                $sql = QueriesDAO::getMaxIDSignal();
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
