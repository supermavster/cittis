<?php

// Add Library
require_once 'Settings.php';

class Control  extends Settings
{

    protected $controllerProject;

    public function __construct()
    {
        parent::__construct();
    }

    public function makeIndex()
    {
        // Add Connection
        require_once AS_PROJECTS . constant("nameProject") . '/controller/ControlProject.php';
        $connection = parent::getDataBase();
        $generalConnection = parent::getGeneralConnection();
        $this->controllerProject = new ControlProject($this, $connection, $generalConnection);
        // End All connections DB
    }


    /**
     * Make Elements
     **/
    public function makeWebSite()
    {
        // Add Connection
        $connection = parent::getDataBase();
        // Show Files
        $tempFile = array("body", "head", "html");
        for ($i = 0; $i < count($tempFile); $i++) {
            require_once AS_TEMPLATE . $tempFile[$i] . ".php";
        }
        // End All connections DB
        parent::finish();
    }

    public function makeActionRequest()
    {
        // Add Connection
        $connection = parent::getDataBase();
        $generalConnection = parent::getGeneralConnection();
        require_once 'MakeActions.php';
        new MakeActions($connection, $generalConnection);
        // End All connections DB
        parent::finish();
    }

}

// Start Process
if (!isset($ctrl)) {
    $ctrl = new Control();
}
