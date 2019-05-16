<?php
// Logic
// Data Main
$data = [];
$data['pathMain'] = "";
$data['page'] = "Lista Obstaculos";
$data['title'] = "Urbana - $data[page]";

// Queries
$count = -1;
$sql = "SELECT (MAX(IdIv)+1) IdIv FROM iv";
$data['id'] = self::getDataBase()->db_exec('value',$sql);
$data['id'] = isset($data['id'])?$data['id']:1;

$sql = "SELECT nombreO AS name FROM obstaculos ";
$data['option'][++$count] = self::getValuesSQL($sql);
//showElements($data);