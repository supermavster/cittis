<?php 
function Obstaculo()
{
  $mysqli = getConnexion();
  $query = 'SELECT L.IdList AS Lista, L.IdAn AS NumeroAnden, O.nombreO AS Obstaculo
FROM  `listaobstaculos` AS L
JOIN  `obstaculos` AS O ON L.IdO = O.IdO';
  return $mysqli->query($query);
}

