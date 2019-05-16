<?php 
function getAllListsAndVideos()
{
  $mysqli = getConnexion();
  $query = 'SELECT I.IdIv as inventario,I.FechaIni as Inicio,I.FechaFin as Fin,I.Direccion as Direccion,I.ViaPrin as ViaInicio,I.TramoIni as Inicial,I.TramoFin as Final,I.LongTramo as Total,T.nombretv as nombre,P.nombrep as proyecto,I.Inclinacion as inclinacion, Pe.nombre as nombreper, Pu.IdPu as puente,Mu.IdMu as muro,Tu.IdTu as tunel,Pes.IdPes as pesaje,Cun.IdCun as cuneta,Pea.IdPea as peaje,Alc.IdAlc as alcantarilla,Pon.IdPon as ponton,SCon.IdSCon as sistemacontencion   FROM `iv` AS I JOIN `tipovia` AS T ON I.IdTv = T.IdTv JOIN `proyecto` AS P ON I.IdP = P.IdP  JOIN `persona` AS Pe ON I.IdPer = Pe.IdPer JOIN `puente` AS Pu ON I.IdPu = Pu.IdPu JOIN `muro` AS Mu ON I.IdMu = Mu.IdMu JOIN `tunel` AS Tu ON I.IdTu = Tu.IdTu JOIN `pesaje` AS Pes ON I.IdPes = Pes.IdPes JOIN `cuneta` AS Cun ON I.IdCun = Cun.IdCun JOIN `peaje` AS Pea ON I.IdPea = Pea.IdPea JOIN `alcantarilla` AS Alc ON I.IdAlc = Alc.IdAlc JOIN `ponton` AS Pon ON I.IdPon = Pon.IdPon JOIN `sistemacontencion` AS SCon ON I.IdSCon = SCon.IdSCon;';
  return $mysqli->query($query);
}