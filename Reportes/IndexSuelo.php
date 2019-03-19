<?php 
require_once 'functions/conexion.php';
require_once 'functions/Suelos.php';
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
    <h1>Exportar informe <small>Suelos</small></h1>
  </div>
  <a href="ExcelSuelos.php" target="_blank">Descargar informe en excel</a>
  <div class="row">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Número Lista</th>
          <th>Costado</th>
          <th>Uso</th>
          <th>Inventario</th>
         
        </tr>
      </thead>
      <tbody>
      <?php 
      $informe = Suelo();
      while($row = $informe->fetch_array(MYSQLI_ASSOC))
      {
        echo '<tr>';
        echo "<td>$row[Lista]</td>";
		echo "<td>$row[Costado]</td>";
        echo "<td>$row[Uso]</td>";
        echo "<td>$row[inventario]</td>";
		echo '</tr>';
      }
      ?>
      </tbody>
    </table>
  </div>
</div>
</body>
</html>