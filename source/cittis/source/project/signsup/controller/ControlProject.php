<?php


class ControlProject
{
    protected $connection;
    protected $generalConnection;

    protected $controller;

    public function __construct($controller,$connection, $generalConnection)
    {
        $this->controller = $controller;
        $this->connection = $connection;
        $this->generalConnection = $generalConnection;
        self::initProcess();
    }

    protected function initProcess()
    {
        $data = array();
        $content = "";
        switch (true) {

        }
        // Add Global Data
        define('DATA',$data);
        // Show Data
        if (!empty($content)) {
            showElements($content);
        }else{
            self::getController()->makeWebsite();
        }
    }

    /** Elements Base **/

    public function getValuesSQL($sql){
        $data = "";
        $query = self::getDataBase()->db_exec('fetch_array',$sql);
        if(isset($query)) {
            foreach ($query as $key => $value) {
                $data .= "<option class='dropdown-item'>$value[name]</option>";
            }
        }
        return $data;
    }

    /** Get Data Main **/
    protected function getController(){
        return $this->controller;
    }

    protected function getDataBase()
    {
        return $this->connection;
    }

    protected function getGeneralConnection()
    {
        return $this->generalConnection;
    }
}

// Methods

