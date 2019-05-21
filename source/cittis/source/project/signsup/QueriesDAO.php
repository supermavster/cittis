<?php


class QueriesDAO
{

    /** TODO:INSERT ELEMENTS **/

    // -----------------------------------------------------------------------------------------------
    // --                                      General Data
    // -----------------------------------------------------------------------------------------------


    /** INSERT Data Firebase Table
     * @param $values
     * @param $idArray
     * @return string
     */
    final public static function addDataFirebase($values, $idArray)
    {
        // SQL Main
        $sql = "INSERT INTO `cittisco_generaldata`.`firebase` (`idFirebase`, `idEmail`, `temp`, `isUser`) VALUES (";// 'LJCpaE6xqmTOmtsKXJp6hnnya2d2', 'mtorres@cittus.com', '0', '1');
        // Get Data
        $sql .= self::getValues($values, $idArray);
        // Return SQL (Made)
        return $sql;
    }


    /** Insert User
     * @param $values
     * @param $idArray
     * @return string
     */
    final public static function addDataUser($values, $idArray)
    {
        // SQL Main
        $sql = "INSERT INTO `cittisco_generaldata`.`users` (`username`, `firstName`, `lastName`, `status`, `idFirebase`) VALUES (";//'Mavster', 'Miguel', 'Torres', '1', '1');
        // Get Data
        $sql .= self::getValues($values, $idArray);
        // Return SQL (Made)
        return $sql;
    }

    /** Insert Rule
     * @param $values
     * @param $idArray
     * @return string
     */
    final public static function addDataRule($values, $idArray)
    {
        // SQL Main
        $sql = "INSERT INTO `cittisco_generaldata`.`rules` (`idRule`, `enable`, `idMunicipality`) VALUES (";//'1', '1', '15238');
        // Get Data
        $sql .= self::getValues($values, $idArray);
        // Return SQL (Made)
        return $sql;
    }

    /** Insert Project
     * @param $values
     * @param $idArray
     * @return string
     */
    final public static function addDataProject($values, $idArray)
    {
        // SQL Main
        $sql = "INSERT INTO `cittisco_generaldata`.`projects` (`idProject`, `nameProject`, `idRule`) VALUES (";//'1', 'INVIAS-01', '1');
        // Get Data
        $sql .= self::getValues($values, $idArray);
        // Return SQL (Made)
        return $sql;
    }

    /** Insert Project - Rule
     * @param $values
     * @param $idArray
     * @return string
     */
    final public static function addDataProjectRule($values, $idArray)
    {
        // SQL Main
        $sql = "INSERT INTO `cittisco_generaldata`.`rules_projects` (`idRules`, `IdProject`) VALUES (";//'1', '1');
        // Get Data
        $sql .= self::getValues($values, $idArray);
        // Return SQL (Made)
        return $sql;
    }

    /** Insert Project - User
     * @param $values
     * @param $idArray
     * @return string
     */
    final public static function addDataProjectUser($values, $idArray)
    {
        // SQL Main
        $sql = "INSERT INTO `cittisco_generaldata`.`users_projects` (`idUser`, `idProject`) VALUES (";//'1', '1');
        // Get Data
        $sql .= self::getValues($values, $idArray);
        // Return SQL (Made)
        return $sql;
    }

    // -----------------------------------------------------------------------------------------------
    // --                                      Signal
    // -----------------------------------------------------------------------------------------------

    /** Insert Coordinates
     * @param $values
     * @param $idArray
     * @return string
     */
    final public static function addDataCoordinates($values, $idArray)
    {
        // SQL Main
        $sql = "INSERT INTO `cittisco_signsup`.`coordinates` (`altitude`, `longitude`, `latitude`) VALUES (";//'1', '2', '3');
        // Get Data
        $sql .= self::getValues($values, $idArray);
        // Return SQL (Made)
        return $sql;
    }

    /** Insert States
     * @param $values
     * @param $idArray
     * @return string
     */
    final public static function addDataStates($values, $idArray)
    {
        // SQL Main
        $sql = "INSERT INTO `cittisco_signsup`.`state` (`nameState`) VALUES (";//'BUENO'); (MALO & REGULAR)
        // Get Data
        $sql .= self::getValues($values, $idArray);
        // Return SQL (Made)
        return $sql;
    }

    /** Insert Name List Signs
     * @param $values
     * @param $idArray
     * @return string
     */
    final public static function addDataNameListSigns($values, $idArray)
    {
        // SQL Main
        $sql = "INSERT INTO `cittisco_signsup`.`namelistsigns` (`idInformativeSigns`) VALUES (";//'SI-01');
        // Get Data
        $sql .= self::getValues($values, $idArray);
        // Return SQL (Made)
        return $sql;
    }

    /** Insert Signal Main
     * @param $values
     * @param $idArray
     * @return string
     */
    final public static function addDataSignalMain($values, $idArray)
    {
        // SQL Main
        $sql = "INSERT INTO `cittisco_signsup`.`signalmain` (`typeSignal`, `idCoordinates`, `idNameSignal`, `stateSignal`) VALUES (";//'VERTICAL', '1', '1', '1');
        // Get Data
        $sql .= self::getValues($values, $idArray);
        // Return SQL (Made)
        return $sql;
    }

    /** Insert List Project - Signal
     * @param $values
     * @param $idArray
     * @return string
     */
    final public static function addDataListSignal($values, $idArray)
    {
        // SQL Main
        $sql = "INSERT INTO `cittisco_signsup`.`listsignal` (`idSignal`, `idProject`) VALUES (";//'1', '1');
        // Get Data
        $sql .= self::getValues($values, $idArray);
        // Return SQL (Made)
        return $sql;
    }

    // -----------------------------------------------------------------------------------------------
    // --                              Signal  -   Vertical
    // -----------------------------------------------------------------------------------------------

    /** Insert Side
     * @param $values
     * @param $idArray
     * @return string
     */
    final public static function addDataSide($values, $idArray)
    {
        // SQL Main
        $sql = "INSERT INTO `cittisco_signsup`.`side` (`nameSide`) VALUES (";//'test-side');
        // Get Data
        $sql .= self::getValues($values, $idArray);
        // Return SQL (Made)
        return $sql;
    }

    /** Insert Type Post
     * @param $values
     * @param $idArray
     * @return string
     */
    final public static function addDataTypePost($values, $idArray)
    {
        // SQL Main
        $sql = "INSERT INTO `cittisco_signsup`.`typepost` (`nameTypePost`) VALUES (";//'test-typepost');
        // Get Data
        $sql .= self::getValues($values, $idArray);
        // Return SQL (Made)
        return $sql;
    }

    /** Insert Size Signal
     * @param $values
     * @param $idArray
     * @return string
     */
    final public static function addDataSizeSignal($values, $idArray)
    {
        // SQL Main
        $sql = "INSERT INTO `cittisco_signsup`.`sizesignal` (`nameSize`) VALUES (";//'test-sizesignal');
        // Get Data
        $sql .= self::getValues($values, $idArray);
        // Return SQL (Made)
        return $sql;
    }

    /** Insert Signal Vertical
     * @param $values
     * @param $idArray
     * @return string
     */
    final public static function addDataSignalVertical($values, $idArray)
    {
        // SQL Main
        $sql = "INSERT INTO `cittisco_signsup`.`signalvertical` (`idSignal`, `idSide`, `idTypePost`, `idSizeSignal`, `statePost`) VALUES (";//'1', '1', '1', '1', '1');
        // Get Data
        $sql .= self::getValues($values, $idArray);
        // Return SQL (Made)
        return $sql;
    }

    // -----------------------------------------------------------------------------------------------
    // --                              Signal  -   Horizontal
    // -----------------------------------------------------------------------------------------------

    /** Insert Location
     * @param $values
     * @param $idArray
     * @return string
     */
    final public static function addDataLocation($values, $idArray)
    {
        // SQL Main
        $sql = "INSERT INTO `cittisco_signsup`.`location` (`nameLocation`) VALUES (";//'test-location');
        // Get Data
        $sql .= self::getValues($values, $idArray);
        // Return SQL (Made)
        return $sql;
    }

    /** Insert Rail
     * @param $values
     * @param $idArray
     * @return string
     */
    final public static function addDataRail($values, $idArray)
    {
        // SQL Main
        $sql = "INSERT INTO `cittisco_signsup`.`rail` (`nameRail`) VALUES (";//'test-rail');
        // Get Data
        $sql .= self::getValues($values, $idArray);
        // Return SQL (Made)
        return $sql;
    }

    /** Insert Signal Horizontal
     * @param $values
     * @param $idArray
     * @return string
     */
    final public static function addDataSignalHorizontal($values, $idArray)
    {
        // SQL Main
        $sql = "INSERT INTO `cittisco_signsup`.`signalhorizontal` (`idSignal`, `idLocation`, `idRail`) VALUES (";//'1', '1', '1');
        // Get Data
        $sql .= self::getValues($values, $idArray);
        // Return SQL (Made)
        return $sql;
    }

    /** TODO:GET ELEMENTS **/

    /**
     * Count Inventory - List
     * @param $idSignal
     * @param $idProject
     * @return string
     */
    final static function getCountInventoryById($idSignal, $idProject)
    {
        return "SELECT COUNT(*) as countInventory FROM `cittisco_signsup`.`listsignal` listSignal WHERE `listSignal`.idSignal = '$idSignal' AND `listSignal`.idProject = '$idProject';";
    }

    /** Max ID (+1) - Signal **/
    final static function getMaxIDSignal()
    {
        return "SELECT (MAX(signalmain.idSignal)+1) AS maxID FROM `cittisco_signsup`.`signalmain` signalmain;";
    }

    /** Get Rules By User (municipio,departamento)
     * @param $idUserFirebase
     * @return string
     */
    final static function getRulesMunicipalitiesDepartmentsByUser($idUserFirebase)
    {
        return "SELECT `municipalities`.nameMunicipality AS nameMunicipality, `department`.nameDepartment AS nameDepartment
                FROM 
                `cittisco_generaldata`.`firebase` firebase
                INNER JOIN 
                `cittisco_generaldata`.`users` users
                ON `firebase`.id = `users`.idFirebase
                INNER JOIN
                `cittisco_generaldata`.`projects` projects 
                ON 
                `users`.idUser = `projects`.idProject
                INNER JOIN
                `cittisco_generaldata`.`users_projects` users_projects
                ON
                `users_projects`.idProject = `projects`.idProject
                INNER JOIN
                `cittisco_generaldata`.`rules_projects` rules_projects
                ON 
                `rules_projects`.idProject = `projects`.idProject
                 INNER JOIN
                `cittisco_generaldata`.`rules`
                ON
                `rules_projects`.idRules = `rules`.idRule
                INNER JOIN
                `cittisco_generaldata`.`municipalities` municipalities
                ON
                `rules`.idMunicipality =  `municipalities`.idMunicipality
                INNER JOIN
                `cittisco_generaldata`.`department` department
                ON
                `department`.idDepartment =  `municipalities`.idDepartment
                WHERE
                `users`.idUser = `users_projects`.idUser
                AND
                `firebase`.idFirebase = '$idUserFirebase' 
                ;";
    }

    /** Only Departamentos
     * @param $idUserFirebase
     * @return string
     */
    final static function getRulesDepartmentsByUser($idUserFirebase)
    {
        return "SELECT `department`.nameDepartment AS nameDepartment
                FROM 
                `cittisco_generaldata`.`firebase` firebase
                INNER JOIN 
                `cittisco_generaldata`.`users` users
                ON `firebase`.id = `users`.idFirebase
                INNER JOIN
                `cittisco_generaldata`.`projects` projects 
                ON 
                `users`.idUser = `projects`.idProject
                INNER JOIN
                `cittisco_generaldata`.`users_projects` users_projects
                ON
                `users_projects`.idProject = `projects`.idProject
                INNER JOIN
                `cittisco_generaldata`.`rules_projects` rules_projects
                ON 
                `rules_projects`.idProject = `projects`.idProject
                 INNER JOIN
                `cittisco_generaldata`.`rules`
                ON
                `rules_projects`.idRules = `rules`.idRule
                INNER JOIN
                `cittisco_generaldata`.`municipalities` municipalities
                ON
                `rules`.idMunicipality =  `municipalities`.idMunicipality
                INNER JOIN
                `cittisco_generaldata`.`department` department
                ON
                `department`.idDepartment =  `municipalities`.idDepartment
                WHERE
                `users`.idUser = `users_projects`.idUser
                AND
                `firebase`.idFirebase = '$idUserFirebase' 
                GROUP BY nameDepartment
                ;";
    }

    /** Only Name Department
     * @param $idUserFirebase
     * @param string $name
     * @return string
     */
    final static function getRulesNameDepartmentsByUser($idUserFirebase, $name = "")
    {
        $sql = "";
        if (isset($name) && !empty($name) && $name != 'all') {
            $sql = "AND `department`.nameDepartment LIKE '%$name%'";
        }

        // Query Normal
        return "SELECT `department`.nameDepartment AS nameDepartment
                FROM 
                `cittisco_generaldata`.`firebase` firebase
                INNER JOIN 
                `cittisco_generaldata`.`users` users
                ON `firebase`.id = `users`.idFirebase
                INNER JOIN
                `cittisco_generaldata`.`projects` projects 
                ON 
                `users`.idUser = `projects`.idProject
                INNER JOIN
                `cittisco_generaldata`.`users_projects` users_projects
                ON
                `users_projects`.idProject = `projects`.idProject
                INNER JOIN
                `cittisco_generaldata`.`rules_projects` rules_projects
                ON 
                `rules_projects`.idProject = `projects`.idProject
                 INNER JOIN
                `cittisco_generaldata`.`rules`
                ON
                `rules_projects`.idRules = `rules`.idRule
                INNER JOIN
                `cittisco_generaldata`.`municipalities` municipalities
                ON
                `rules`.idMunicipality =  `municipalities`.idMunicipality
                INNER JOIN
                `cittisco_generaldata`.`department` department
                ON
                `department`.idDepartment =  `municipalities`.idDepartment
                WHERE
                `users`.idUser = `users_projects`.idUser
                AND
                `firebase`.idFirebase = '$idUserFirebase' 
                $sql
                GROUP BY nameDepartment
                ;";
    }




    /** Only Municipios
     * @param $idUserFirebase
     * @return string
     */
    final static function getRulesMunicipalitiesByUser($idUserFirebase)
    {
        return "SELECT `municipalities`.nameMunicipality AS nameMunicipality
                FROM 
                `cittisco_generaldata`.`firebase` firebase
                INNER JOIN 
                `cittisco_generaldata`.`users` users
                ON `firebase`.id = `users`.idFirebase
                INNER JOIN
                `cittisco_generaldata`.`projects` projects 
                ON 
                `users`.idUser = `projects`.idProject
                INNER JOIN
                `cittisco_generaldata`.`users_projects` users_projects
                ON
                `users_projects`.idProject = `projects`.idProject
                INNER JOIN
                `cittisco_generaldata`.`rules_projects` rules_projects
                ON 
                `rules_projects`.idProject = `projects`.idProject
                 INNER JOIN
                `cittisco_generaldata`.`rules`
                ON
                `rules_projects`.idRules = `rules`.idRule
                INNER JOIN
                `cittisco_generaldata`.`municipalities` municipalities
                ON
                `rules`.idMunicipality =  `municipalities`.idMunicipality
                INNER JOIN
                `cittisco_generaldata`.`department` department
                ON
                `department`.idDepartment =  `municipalities`.idDepartment
                WHERE
                `users`.idUser = `users_projects`.idUser
                AND
                `firebase`.idFirebase = '$idUserFirebase' 
                GROUP BY nameMunicipality
                ;";
    }

    /** Only Municipios - By ID Firebase
     * @param $idUserFirebase
     * @return string
     */
    final static function getRulesNameMunicipalitiesByUser($idUserFirebase, $name = "")
    {
        $sql = "";
        if (isset($name) && !empty($name) && $name != 'all') {
            $sql = "AND `department`.nameDepartment LIKE '%$name%'";
        }
        return "SELECT `municipalities`.nameMunicipality AS nameMunicipality
                FROM 
                `cittisco_generaldata`.`firebase` firebase
                INNER JOIN 
                `cittisco_generaldata`.`users` users
                ON `firebase`.id = `users`.idFirebase
                INNER JOIN
                `cittisco_generaldata`.`projects` projects 
                ON 
                `users`.idUser = `projects`.idProject
                INNER JOIN
                `cittisco_generaldata`.`users_projects` users_projects
                ON
                `users_projects`.idProject = `projects`.idProject
                INNER JOIN
                `cittisco_generaldata`.`rules_projects` rules_projects
                ON 
                `rules_projects`.idProject = `projects`.idProject
                 INNER JOIN
                `cittisco_generaldata`.`rules`
                ON
                `rules_projects`.idRules = `rules`.idRule
                INNER JOIN
                `cittisco_generaldata`.`municipalities` municipalities
                ON
                `rules`.idMunicipality =  `municipalities`.idMunicipality
                INNER JOIN
                `cittisco_generaldata`.`department` department
                ON
                `department`.idDepartment =  `municipalities`.idDepartment
                WHERE
                `users`.idUser = `users_projects`.idUser
                AND
                `firebase`.idFirebase = '$idUserFirebase' 
                $sql
                GROUP BY nameMunicipality
                ;";
    }

    /** Process *
     * @param $values
     * @param $idArray
     * @param int $short
     * @return string
     */
    protected function getValues($values, $idArray, $short = 0)
    {
        $sql = "";
        $values = $values[$idArray];
        $tempValue = 0;
        foreach ($values as $valor) {
            $sql .= "'$valor'";
            if ($tempValue++ == (count($values) - $short)) {
                $sql .= ");";
                break;
            } else {
                $sql .= ",";
            }
        }
        return $sql;
    }


}

new QueriesDAO();
