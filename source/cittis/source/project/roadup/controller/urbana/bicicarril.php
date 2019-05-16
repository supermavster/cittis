<?php
// Logic
$data = [];
$data['pathMain'] = "";
$data['page'] = "Bicicarril";
$data['title'] = "Urbana - $data[page]";

// Data Main
$sql = "SELECT (MAX(IdIv)+1) IdIv FROM iv";
$data['id'] = self::getDataBase()->db_exec('value',$sql);
$data['id'] = isset($data['id'])?$data['id']:1;

// Queries
$count = -1;
$sql = "SELECT nombre AS name FROM estado ";
$data['option'][++$count] = self::getValuesSQL($sql);

$sql = "SELECT NombreTs AS name FROM tiposegregacion ";
$data['option'][++$count] = self::getValuesSQL($sql);

$sql = "SELECT NombreSc AS name FROM sentidocirculacion ";
$data['option'][++$count] = self::getValuesSQL($sql);

$sql = "SELECT nombreTC AS name FROM tipocobertura ";
$data['option'][++$count] = self::getValuesSQL($sql);
//showElements($data);