<?php 
require_once 'functions/conexion.php';
require_once 'functions/getAllListsAndVideos.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Exportar informe Excel</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>
<div class="container">
  <div class="page-header text-left">
    <h1>Exportar informe <small>Inventario</small></h1>
  </div>
  <a href="createExcel.php" target="_blank">Descargar informe en excel</a>
  <div class="row">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Número Inventario</th>
          <th>Fecha Inicio</th>
          <th>Fecha Fin</th>
          <th>Via Principal</th>
          <th>Tramo Inicial</th>
          <th>Tramo Final</th>
          <th> Longitud del tramo </th>
          <th>Tipo Via</th>
          <th>Proyecto </th>
          <th>Inclinacion</th>
          <th>Persona</th>
          <th>Puente</th>
          <th>Muro</th>
          <th>Tunel</th>
          <th>Pesaje</th>
          <th>Cuneta</th>
          <th>Peaje</th>
          <th>Alcantarilla</th>
          <th>Ponton</th>
          <th>SistemaContencion</th>
                  </tr>
      </thead>
      <tbody>
      <?php 
      $informe = getAllListsAndVideos();
      while($row = $informe->fetch_array(MYSQLI_ASSOC))
      {
        echo '<tr>';
        echo "<td>$row[inventario]</td>";
        echo "<td>$row[Inicio]</td>";
        echo "<td>$row[Fin]</td>";
        echo "<td>$row[ViaInicio]</td>";
		echo "<td>$row[Inicial]</td>";
		echo "<td>$row[Final]</td>";
		echo "<td>$row[Total]</td>";
		echo "<td>$row[nombre]</td>";
		echo "<td>$row[proyecto]</td>";
		echo "<td>$row[inclinacion]</td>";
		echo "<td>$row[nombreper]</td>";
		echo "<td>$row[puente]</td>";
		echo "<td>$row[muro]</td>";
		echo "<td>$row[tunel]</td>";
		echo "<td>$row[pesaje]</td>";
		echo "<td>$row[cuneta]</td>";
		echo "<td>$row[peaje]</td>";
		echo "<td>$row[alcantarilla]</td>";
		echo "<td>$row[ponton]</td>";
		echo "<td>$row[sistemacontencion]</td>";
        echo '</tr>';
      }
      ?>
      </tbody>
    </table>
  </div>
</div>
</body>
</html>