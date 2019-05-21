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
        $content = "";
        switch (true) {
            case getRequest("add"):
                $content = self::addElements();
                break;
            default:
                $this->response['error'] = true;
                $this->response['response'] = 'No existe operacion para este proceso';
        }
        showElements($this->response);
    }

    protected function addElements()
    {
        switch (getRequest("add")) {
            case 'signal':
                self::initProcessSignal();
                break;
            default:
                $this->response['error'] = true;
                $this->response['response'] = 'No existe operacion para este proceso';
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
