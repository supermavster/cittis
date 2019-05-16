<?php
// Logic
// Data Main
$data = [];
$data['pathMain'] = "";
$data['page'] = "Separador";
$data['title'] = "Urbana - $data[page]";

// Queries
$count = -1;
$sql = "SELECT (MAX(IdIv)+1) IdIv FROM iv";
$data['id'] = self::getDataBase()->db_exec('value',$sql);
$data['id'] = isset($data['id'])?$data['id']:1;


$sql = "SELECT nombreTC AS name FROM tipocobertura ";
$data['option'][++$count] = self::getValuesSQL($sql);

$sql = "SELECT nombre AS name FROM estado ";
$data['option'][++$count] = self::getValuesSQL($sql);

$sql = "SELECT NombreTs AS name FROM tiposegregacion ";
$data['option'][++$count] = self::getValuesSQL($sql);
//showElements($data);