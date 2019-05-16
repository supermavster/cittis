<?php
// Logic
// Data Main
$data = [];
$data['pathMain'] = "";
$data['page'] = "Puente";
$data['title'] = "Rural - $data[page]";

// Queries
$count = -1;

$sql = "SELECT (MAX(IdIv)+1) IdIv FROM iv";
$data['id'] = self::getDataBase()->db_exec('value',$sql);
$data['id'] = isset($data['id'])?$data['id']:1;

// Queries
$sql = "SELECT Nombre AS name FROM tipopuente ";
$data['option'][++$count] = self::getValuesSQL($sql);

$sql = "SELECT NombreTp AS name FROM tipopaso ";
$data['option'][++$count] = self::getValuesSQL($sql);

$sql = "SELECT NombreSc AS name FROM sentidocirculacion ";
$data['option'][++$count] = self::getValuesSQL($sql);

$sql = "SELECT NombreTm AS name FROM tipomaterialpuente ";
$data['option'][++$count] = self::getValuesSQL($sql);

//showElements($data);
