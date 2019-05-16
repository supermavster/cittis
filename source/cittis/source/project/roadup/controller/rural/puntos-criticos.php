<?php
// Logic
// Data Main
$data = [];
$data['pathMain'] = "";
$data['page'] = "Puntos Criticos";
$data['title'] = "Rural - $data[page]";

// Queries
$count = -1;

$sql = "SELECT (MAX(IdIv)+1) IdIv FROM iv";
$data['id'] = self::getDataBase()->db_exec('value',$sql);
$data['id'] = isset($data['id'])?$data['id']:1;

// Queries
$sql = "SELECT nombreCo AS name FROM costado ";
$data['option'][++$count] = self::getValuesSQL($sql);

//showElements($data);
