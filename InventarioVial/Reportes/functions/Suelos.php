<?php 
function Suelo()
{
  $mysqli = getConnexion();
  $query = 'SELECT L.IdListUs AS Lista, C.nombreCo AS Costado, T.NombreTus AS Uso, I.IdIv AS inventario
FROM  `listasuelo` AS L
JOIN  `costado` AS C ON L.IdCos = C.IdCo
JOIN  `tipousosuelo` AS T ON L.IdTus = T.IdTus
JOIN  `iv` AS I ON L.IdIv = I.IdIv';
  return $mysqli->query($query);
}

