<?php 
require_once 'functions/conexion.php';
require_once 'functions/Anden.php';
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
    <h1>Exportar informe <small>Anden</small></h1>
  </div>
  <a href="ExcelAnden.php" target="_blank">Descargar informe en excel</a>
  <div class="row">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Número Anden</th>
          <th>Número Inventario</th>
          <th>Número de Andenes</th>
          <th>Altura De Bordillo</th>
          <th>Ancho</th>
          <th>Costado</th>
          <th> Estado </th>
          <th>Tipo Cobertura</th>
               
        </tr>
      </thead>
      <tbody>
      <?php 
      $informe = Anden();
      while($row = $informe->fetch_array(MYSQLI_ASSOC))
      {
        echo '<tr>';
        echo "<td>$row[Anden]</td>";
		echo "<td>$row[Inventario]</td>";
        echo "<td>$row[NumeroAndenes]</td>";
        echo "<td>$row[AlturaBordillo]</td>";
        echo "<td>'$row[Ancho]'</td>";
		echo "<td>'$row[costado]'</td>";
		echo "<td>'$row[estado]'</td>";
		echo "<td>'$row[nombre]'</td>";
		echo '</tr>';
      }
      ?>
      </tbody>
    </table>
  </div>
</div>
</body>
</html>