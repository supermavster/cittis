<?php 
require_once 'functions/conexion.php';
require_once 'functions/Separador.php';
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
    <h1>Exportar informe <small>Separadores</small></h1>
  </div>
  <a href="ExcelSeparador.php" target="_blank">Descargar informe en excel</a>
  <div class="row">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Número Separador</th>
          <th>Ancho</th>
          <th>Altura Bordillo</th>
          <th>Inventario</th>
          <th>Cobertura</th>
          <th>estado</th>
          <th>Segregacion</th>
         
        </tr>
      </thead>
      <tbody>
      <?php 
      $informe = Separador();
      while($row = $informe->fetch_array(MYSQLI_ASSOC))
      {
        echo '<tr>';
        echo "<td>$row[Separador]</td>";
		echo "<td>$row[Ancho]</td>";
        echo "<td>$row[AlturaBordillo]</td>";
        echo "<td>$row[inventario]</td>";
		echo "<td>$row[Cobertura]</td>";
		echo "<td>$row[estado]</td>";
		echo "<td>$row[Segregacion]</td>";
		echo '</tr>';
      }
      ?>
      </tbody>
    </table>
  </div>
</div>
</body>
</html>