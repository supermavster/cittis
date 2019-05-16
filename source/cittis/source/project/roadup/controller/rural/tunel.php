<?php
// Logic
// Data Main
$data = [];
$data['pathMain'] = "";
$data['page'] = "Tunel";
$data['title'] = "Rural - $data[page]";

// Queries
$count = -1;

$sql = "SELECT MAX(IdCal) AS IdCal FROM calzada";
$data['id'] = self::getDataBase()->db_exec('value',$sql);
$data['id'] = isset($data['id'])?$data['id']:1;

// Queries
$sql = "SELECT Nombre AS name FROM servicio ";
$data['option'][++$count] = self::getValuesSQL($sql);

//showElements($data);
