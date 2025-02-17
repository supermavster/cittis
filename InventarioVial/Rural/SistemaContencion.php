<?php require_once('Connections/Conexion.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO sistemacontencion (IdEs, Material, IdCo, Longitud, DistanciaPunto0) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['IdEs'], "int"),
                       GetSQLValueString($_POST['Material'], "text"),
                       GetSQLValueString($_POST['IdCo'], "int"),
                       GetSQLValueString($_POST['Longitud'], "text"),
                       GetSQLValueString($_POST['DistanciaPunto0'], "text"));

  //mysql_select_db($database_Conexion, $Conexion);
  //$Result1 = mysql_query($insertSQL, $Conexion) or die(mysql_error());

  $insertGoTo = "SistemaContencion.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

$query_RecordsetEstado = "SELECT * FROM estado";
$row_RecordsetEstado = $Conexion->db_exec('fetch_assoc',$query_RecordsetEstado);
$totalRows_RecordsetEstado =$Conexion->db_exec('num_rows',$query_RecordsetEstado);

$query_RecordsetCostado = "SELECT * FROM costado";
$row_RecordsetCostado = $Conexion->db_exec('fetch_assoc',$query_RecordsetCostado);
$totalRows_RecordsetCostado = $Conexion->db_exec('num_rows',$query_RecordsetCostado);
echo "<script type=\"text/javascript\">alert(\"Insercion Correcta\");</script>";
?>
<!DOCTYPE html>
<html>
<head>
<title>ITTUS INVENTARIOS VIALES</title>
<!--mobile apps-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Dream up Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--mobile apps-->
<!--Custom Theme files -->
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all"> 
<link rel="stylesheet" type="text/css" href="css/component.css" />
<link href="css/estilos.css" type="text/css" rel="stylesheet" media="all"> 

<!-- //Custom Theme files -->	

<!--web-fonts-->
	<link href='//fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Poppins:400,500,600' rel='stylesheet' type='text/css'>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryValidationCheckbox.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="icon/css/fontello.css">
<!--//web-fonts-->

<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationCheckbox.js" type="text/javascript"></script>
</head>
<body>
	<!-- main content start-->
     <!--start-home-->
	<div id="home" class="header">
			<!--start-header-->
            <div class="header-strip w3l">
			   <div class="container">
			   <p class="phonenum"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span></p>
				<p class="phonenum two"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> </p>
<p class="phonenum two one"><span class="glyphicon glyphicon-time" aria-hidden="true"></span><?php
ini_set('date.timezone', 'America/Bogota');

$time1 = date ('H:i:s', time());

$time2 = date ('Y-m-d, H:i:s', time());


echo date("g:i a",strtotime($time1));

print '<br>';

echo $time2.'<br>';
?>
 <?php
// realizamos la conexión a la base de datos
  $user = 'root'; 
  $pass = ''; 
  $host = 'localhost'; 
  $db = 'inventariovial'; 
  $config = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'");
  try
  {
      $conn = new PDO("mysql:host=$host;dbname=$db;", $user, $pass, $config);
  }
  catch(PDOException $e)
  {
      echo $e -> getMessage();
  }

  // realizamos la consulta para obtener el mayor id insertado
  $sql = "SELECT MAX(IdIv) AS IdIv FROM iv";
  $query = $conn->prepare($sql);
  $query->execute();
  $row = $query->fetch();
 
  // imprimimos el valor obtenido, en este caso el mayor id insertado en una tabla
   
 echo $row['IdIv'];
 
 
?>
</p>
					

				<div class="clearfix"></div>
			  </div>
			</div>
		<div class="header-top w3l">
		  <div class="container">
		     <div class="logo"> <a href="Danos.php"> <h1><img src="images/logo.png" alt=""> ITTUS <span>Inventarios viales</span></h1>
			 <p class="top-para"></p></a></div>
			
<div class="main-nav">
			  <span class="menu"></span>
				  <div class="top-menu">
							 <ul class="nav navbar-nav cl-effect-14">

								<li><a href="javascript:history.go(-1);">Atras</a></li>
                                
								<li><a href="Cuneta.php" class="scroll">Agregar Cuneta</a></li>
                              
                                <li><a href="Index.php" class="scroll">Finalizar Proceso</a></li>
                                
								
																
							</ul>
				</div>
</div>
<menu class="clearfix">
    <div class="logo fab fa-hooli"></div>
    <ul class="main-menu clearfix">
        <li>
            <a href="#">Calzada Urbana</a>
            <div class="dropdown clearfix">
                <ul>
                    <li><a href="CalzadaUrbana.php">Urbana</a></li>
                    <li><a href="Anden.php">Anden</a></li>
                    <li><a href="BiciCarril.php">Bicicarril</a></li>
                    <li><a href="Cuneta.php">Cuneta</a></li>
                    <li><a href="Danos.php">Daños</a></li>
                    <li><a href="Interseccion.php">Interseccion</a></li>
                    <li><a href="listaObs.php">Obstaculos</a></li>
                    <li><a href="listaSuelo.php">Usos de suelo</a></li>
                    <li><a href="Puente.php">Puentes</a></li>
                    <li><a href="Sumidero.php">Sumidero</a></li>
                    <li><a href="Separador.php">Separador</a></li>
                    <li><a href="pruebaseleccion.php">Prueba mapas </a></li>
                </ul>
               
          </div>
        </li>
        
        <li>
            <a href="#">Calzada Rural</a>
            <div class="dropdown clearfix">
                <ul>
                    <li><a href="Alcantarillas.php">Alcantarillas</a></li>
                    <li><a href="Berma.php">Berma</a></li>
                  
                    <li><a href="Muros.php">Muros</a></li>
                    <li><a href="SistemaContencion.php">Sistema de contencion</a></li>
                    <li><a href="Cuneta.php">Cuneta</a></li>
                    <li><a href="Peaje.php">Peaje</a></li>
                    <li><a href="Pesaje.php">Pesaje</a></li>
                    <li><a href="Puente.php">Puente</a></li>
                    <li><a href="Ponton.php">Ponton</a></li>
                    <li><a href="Talud.php">Talud</a></li>
                    <li><a href="PuntosCriticos.php">Puntos Criticos</a></li>
                    <li><a href="Danos.php">Daños</a></li>
                    <li><a href="Interseccion.php">Interseccion</a></li>
                     <li><a href="SumideroRural.php">Sumidero</a></li>
                    <li><a href="Tunel.php">Tunel</a></li>
                    <li><a href="Tunel.php">Tunel</a></li>
                    
              </ul>
            </div>
        </li>
      
        <li class="search fa fa-search"></li>
    </ul>
</menu>
            <br>
            <br>
            <br><h1><span>Sistema de contencion</span></h1>
            <br>
            <br>
            <img src="images/SistemaContencion.jpg" width="396" height="205"/> 
            <br>
            <br>
<br>

<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table align="center">
  
    <tr valign="baseline">
     <td height="97" align="right" nowrap="nowrap">Su Inventario es:</td>
      <td><input type="text" name="IdIv" value="<?php echo $row['IdIv']; ?>" readonly size="32"/></td>
      
    </tr>
    <tr valign="baseline">
      <td height="106" align="right" nowrap>Material:</td>
      <td><select name="Material">
       <option value="Seleccione">--Seleccione una opcion--</option> 
      <option value="Concreto">Concreto</option>
      <option value="Hierro">Hierro </option>
      
     </select></td>
    </tr>
    <tr valign="baseline">
      <td height="107" align="right" nowrap>Longitud:</td>
      <td><input type="text" name="Longitud" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Distancia Punto 0:</td>
      <td><input type="text" name="DistanciaPunto0" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td height="59" align="right" nowrap>Estado:</td>
      <td><select name="IdEs">
       <option value="Seleccione">--Seleccione una opcion--</option>        <?php 
do {  
?>
        <option value="<?php echo $row_RecordsetEstado['IdEs']?>" ><?php echo $row_RecordsetEstado['nombre']?></option>
        <?php
} while ($row_RecordsetEstado = mysql_fetch_assoc($RecordsetEstado));
?>
      </select></td>
    <tr>
    <tr valign="baseline">
      <td height="71" align="right" nowrap>Costado:</td>
      <td><select name="IdCo">
       <option value="Seleccione">--Seleccione una opcion--</option>
        <?php 
do {  
?>
        <option value="<?php echo $row_RecordsetCostado['IdCo']?>" ><?php echo $row_RecordsetCostado['nombreCo']?></option>
        <?php
} while ($row_RecordsetCostado = mysql_fetch_assoc($RecordsetCostado));
?>
      </select></td>
    <tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Insertar registro"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
</form>
<p>&nbsp;</p>
