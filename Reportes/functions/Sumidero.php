<?php 
function Sumidero()
{
  $mysqli = getConnexion();
  $query = 'SELECT S.IdSu AS Sumidero, S.Distanciadesdeini AS Distancia, I.IdIv AS inventario, C.nombreCo AS Costado
FROM  `sumidero` AS S
JOIN  `iv` AS I ON S.IdIv = I.IdIv
JOIN  `costado` AS C ON S.IdCo = C.IdCo';
  return $mysqli->query($query);
}

