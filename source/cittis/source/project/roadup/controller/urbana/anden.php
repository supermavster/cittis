<?php
// Logic
$data = [];
$data['pathMain'] = "";
$data['page'] = "Anden";
$data['title'] = "Urbana - $data[page]";

// Data Main
$count = -1;

$sql = "SELECT (MAX(IdIv)+1) IdIv FROM iv";
$data['id'] = self::getDataBase()->db_exec('value',$sql);
$data['id'] = isset($data['id'])?$data['id']:1;

// Queries
$sql = "SELECT nombreCo AS name FROM costado ";
$data['option'][++$count] = self::getValuesSQL($sql);

$sql = "SELECT nombre AS name FROM estado ";
$data['option'][++$count] = self::getValuesSQL($sql);

$sql = "SELECT Nombre AS name FROM servicio ";
$data['option'][++$count] = self::getValuesSQL($sql);
//showElements($data);