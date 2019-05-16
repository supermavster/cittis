<?php 
function Anden()
{
  $mysqli = getConnexion();
  $query = 'SELECT A.IdAn as Anden,
A.IdIv as Inventario,A.NumeroAndenes as NumeroAndenes,
A.AlturaBordillo as AlturaBordillo,A.Ancho as Ancho,
C.nombreco as costado ,E.nombre as estado,T.nombreTC as nombre FROM `anden` AS A JOIN
 `iv` AS I ON A.IdIv = I.IdIv JOIN `costado` AS C ON A.costado = C.IdCo JOIN `estado` AS E  ON A.IdEs = E.IdEs JOIN `tipocobertura` AS T    ON A.IdTc = T.IdTc';
  return $mysqli->query($query);
}

