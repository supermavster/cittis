<?php 
function Calzada()
{
  $mysqli = getConnexion();
  $query = 'SELECT C.IdCal as calzada,C.Ancho as Ancho,C.Carriles as Carriles,E.nombre as estado,S.NombreSc as Sentido,T.nombreTC as Cobertura,I.IdIv as Inventario,C.CalzadaParqueo as parqueo FROM `calzada` AS C JOIN `estado` AS E ON C.IdEs = E.IdEs JOIN `sentidocirculacion` AS S ON C.IdSc = S.IdSc  JOIN `tipocobertura` AS T ON C.IdTc = T.IdTc JOIN `iv` AS I ON C.IdIv = I.IdIv';
  return $mysqli->query($query);
}
