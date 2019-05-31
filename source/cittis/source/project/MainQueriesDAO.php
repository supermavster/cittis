<?php


class MainQueriesDAO
{
    /** Get Departments
     * @param $name
     * @return string
     */
    final static function getDepartments($name)
    {
        $sql = "";
        if (isset($name) && !empty($name) && $name != 'all') {
            $sql = "WHERE `nameDepartment` LIKE '%$name%'";
        }
        return "SELECT `nameDepartment` FROM `department` $sql";
    }

    /** Get Departments
     * @param $nameDepartment
     * @return string
     */
    final static function getMunicipalityByDepartment($nameDepartment)
    {
        $sql = "";
        if (isset($nameDepartment) && !empty($nameDepartment) && $nameDepartment != 'all') {
            $sql = "WHERE department.nameDepartment LIKE '%$nameDepartment%'";
        }
        $sql = "SELECT `nameMunicipality` nameMunicipality FROM `department` department inner JOIN `municipalities` municipalities ON municipalities.idDepartment = department.idDepartment " . $sql;
        return $sql;
    }

    /** Get ID Table
     * @param $table
     * @return string
     */
    final static function getIDTable($table)
    {
        return "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE COLUMN_NAME LIKE '%Id%' AND TABLE_NAME LIKE '%$table%' LIMIT 1";
    }

    /** Check ID
     * @param $table
     * @param $idFromtheTable
     * @param $id
     * @return string
     */
    final static function checkID($table, $idFromtheTable, $id)
    {
        if (isset($id)) $withID = "LIKE '%" . $id . "%'";
        return "Select * FROM `" . $table . "` WHERE `" . $idFromtheTable . "` $withID";
    }

    /** Truncate Table
     * @param $table
     * @return string
     */
    final static function truncateTable($table)
    {
        return "TRUNCATE `$table`;";
    }
}

new MainQueriesDAO();
