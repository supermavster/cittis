<?php
// Logic
$data = [];
$data['pathMain'] = "";
$data['page'] = "Calzada";
$data['title'] = "Urbana - $data[page]";

$sql = "SELECT (MAX(IdIv)+1) IdIv FROM iv";
$data['id'] = self::getDataBase()->db_exec('value',$sql);
$data['id'] = isset($data['id'])?$data['id']:1;

// Queries
$count = -1;
$sql = "SELECT nombre AS name FROM estado ";
$data['option'][++$count] = self::getValuesSQL($sql);

$sql = "SELECT NombreSc AS name FROM sentidocirculacion ";
$data['option'][++$count] = self::getValuesSQL($sql);

$sql = "SELECT nombreTC AS name FROM tipocobertura ";
$data['option'][++$count] = self::getValuesSQL($sql);
//showElements($data);
