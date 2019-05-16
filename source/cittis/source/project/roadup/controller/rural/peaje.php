<?php
// Logic
// Data Main
$data = [];
$data['pathMain'] = "";
$data['page'] = "Peaje";
$data['title'] = "Rural - $data[page]";

// Queries
$count = -1;

$sql = "SELECT (MAX(IdIv)+1) IdIv FROM iv";
$data['id'] = self::getDataBase()->db_exec('value',$sql);
$data['id'] = isset($data['id'])?$data['id']:1;

// Queries
$sql = "SELECT Nombre AS name FROM adminrecursos ";
$data['option'][++$count] = self::getValuesSQL($sql);

$sql = "SELECT Nombre AS name FROM operador ";
$data['option'][++$count] = self::getValuesSQL($sql);

//showElements($data);
