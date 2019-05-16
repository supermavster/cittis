<?php 
function Separador()
{
  $mysqli = getConnexion();
  $query = 'SELECT S.IdSe AS Separador, S.Ancho AS Ancho, S.AlturaBordillo AS AlturaBordillo, I.IdIv AS inventario, T.nombreTC AS Cobertura, E.nombre AS estado, TS.NombreTs AS Segregacion
FROM  `separador` AS S
JOIN  `iv` AS I ON S.IdIv = I.IdIv
JOIN  `tipocobertura` AS T ON S.IdTc = T.IdTc
JOIN  `estado` AS E ON S.IdEs = E.IdEs
JOIN  `tiposegregacion` AS TS ON S.IdTs = TS.IdTs';
  return $mysqli->query($query);
}

