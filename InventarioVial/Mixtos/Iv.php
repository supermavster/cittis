    <?php require_once('Connections/Conexion.php'); ?>
<label><?php
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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form4")) {
  $insertSQL = sprintf("INSERT INTO iv (FechaIni, FechaFin, Direccion, ViaPrin, TramoIni, TramoFin, LongTramo, IdTv, IdP, Inclinacion, IdPer) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['FechaIni'], "date"),
                       GetSQLValueString($_POST['FechaFin'], "date"),
                       GetSQLValueString($_POST['Calles'], "text"),
                       GetSQLValueString($_POST['ViaPrin'], "text"),
                       GetSQLValueString($_POST['TramoIni'], "text"),
                       GetSQLValueString($_POST['TramoFin'], "text"),
                       GetSQLValueString($_POST['LongTramo'], "text"),
                       GetSQLValueString($_POST['IdTv'], "int"),
                       GetSQLValueString($_POST['IdP'], "int"),
                       GetSQLValueString($_POST['Inclinacion'], "text"),
                       GetSQLValueString($_POST['IdPer'], "int"));

  mysql_select_db($database_Conexion, $Conexion);
  $Result1 = mysql_query($insertSQL, $Conexion) or die(mysql_error());

  $insertGoTo = "Iv.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_Conexion, $Conexion);
$query_RecordsetTv = "SELECT * FROM tipovia";
$RecordsetTv = mysql_query($query_RecordsetTv, $Conexion) or die(mysql_error());
$row_RecordsetTv = mysql_fetch_assoc($RecordsetTv);
$totalRows_RecordsetTv = mysql_num_rows($RecordsetTv);

mysql_select_db($database_Conexion, $Conexion);
$query_RecordsetPro = "SELECT * FROM proyecto";
$RecordsetPro = mysql_query($query_RecordsetPro, $Conexion) or die(mysql_error());
$row_RecordsetPro = mysql_fetch_assoc($RecordsetPro);
$totalRows_RecordsetPro = mysql_num_rows($RecordsetPro);

mysql_select_db($database_Conexion, $Conexion);
$query_RecordsetPer = "SELECT * FROM persona";
$RecordsetPer = mysql_query($query_RecordsetPer, $Conexion) or die(mysql_error());
$row_RecordsetPer = mysql_fetch_assoc($RecordsetPer);
$totalRows_RecordsetPer = mysql_num_rows($RecordsetPer);
echo "<script type=\"text/javascript\">alert(\"Insercion Correcta\");</script>";
?></label>
<?php require_once('Connections/Conexion.php'); ?>
<?php 
session_start(); 
 
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
<link rel="stylesheet" href="icon/css/fontello.css">
<!--//web-fonts-->
</head>
<body>
	<!-- main content start-->
     <!--start-home-->
	<div id="home" class="header">
			<!--start-header-->
            <div class="header-strip w3l">
			   <div class="container">
			   <p class="phonenum"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> </p>
				<p class="phonenum two"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> </p>
<p class="phonenum two one"><span class="glyphicon glyphicon-time" aria-hidden="true"></span><?php
ini_set('date.timezone', 'America/Bogota');

$time1 = date ('H:i:s', time());

$time2 = date ('Y-m-d, H:i:s', time());


echo date("g:i a",strtotime($time1));

print '<br>';

echo $time2.'<br>';
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

								<li class="active"><a href="Index.php">Inicio</a></li>
                                <li><a href="listaSuelo.php">siguiente</a></li>
                                <li><a href="javascript:history.go(-1);">Atras</a></li>
							    
   
								
							</ul>
				</div>
            </div>
				</ul>
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

<br><?php 
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


<form action="<?php echo $editFormAction; ?>" method="post" name="form2" id="form2">
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>

<form method="post" name="form4" action="<?php echo $editFormAction; ?>">
  <table width="765" align="center">
  <tr valign="baseline">
    <td><table width="765" align="center">
      <tr valign="baseline"></tr>
      <tr valign="baseline"></tr>
      <tr valign="baseline"></tr>
      <tr valign="baseline"></tr>
      <tr valign="baseline">
        <td width="91" align="right" nowrap>Fecha Incio:</td>
        <td width="96" align="right" nowrap>&nbsp;</td>
        <td width="190"><input type="text" name="FechaIni" value="<?php echo $time2; ?>" size="32" readonly></td>
        <td width="54">&nbsp;</td>
        <td width="54">&nbsp;</td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Fecha Fin:</td>
        <td nowrap align="right">&nbsp;</td>
        <td><input type="text" name="FechaFin" value="" readonly size="32"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <script language="JavaScript">
function CambiarFormulario(){
	switch(document.forms[0].Calles.selectedIndex){
		case 0: 
			document.forms[0].Texto1.disabled=false;
			document.forms[0].Texto2.disabled=false;	
			document.forms[0].Texto3.disabled=false;
			break;
		case 1: 
			document.forms[0].Texto1.disabled=false;
			document.forms[0].Texto2.disabled=true;	
			document.forms[0].Texto3.disabled=false;
			break;
		case 2: 
			document.forms[0].Texto1.disabled=true;
			document.forms[0].Texto2.disabled=false;	
			document.forms[0].Texto3.disabled=true;
			break;
	}
}

    </script>
      <tr valign="baseline">
        <td nowrap align="right">Via Principal:</td>
        <td nowrap align="right"><select name="Calles" id="Calles">
          <option value="Carrera">Carrera</option>
          <option value="Calle">Calle</option>
          <option value="Transversal">Transversal</option>
          <option value="Diagonal">Diagonal</option>
        </select></td>
        <td><input type="text" name="ViaPrin" value="" size="32"></td>
        <td>&nbsp;</td>
        <td><input type="text" name="Letra1" value="" size="5" input maxlength="1"></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Tramo Inicio:</td>
        <td nowrap align="right"><select name="Calles2" id="Calles2">
          <option value="Carrera">Carrera</option>
          <option value="Calle">Calle</option>
          <option value="Transversal">Transversal</option>
          <option value="Diagonal">Diagonal</option>
        </select></td>
        <td nowrap align="right"><input type="text" name="TramoIni" value="" size="5"></td>
        <td>&nbsp;</td>
        <td><input type="text" name="Letra" value="" size="5" input maxlength="1"></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">TramoFin:</td>
        <td nowrap align="right"><select name="Calles3" id="Calles3">
          <option value="Carrera">Carrera</option>
          <option value="Calle">Calle</option>
          <option value="Transversal">Transversal</option>
          <option value="Diagonal">Diagonal</option>
        </select></td>
        <td nowrap align="right"><input type="text" name="TramoFin" value="" size="32"></td>
        <td>&nbsp;</td>
        <td><input type="text" name="Letra2" value="" size="5"input maxlength="1"></td>
      </tr>
  <td></td>
  <tr valign="baseline">
    <td nowrap align="right">LongTramo:</td>
    <td nowrap align="right">&nbsp;</td>
    <td><input type="text" name="LongTramo"  size="32"  ></td>
    <td>Metros</td>
    <td>&nbsp;</td>
  </tr>
  <tr valign="baseline">
    <td nowrap align="right">Tipo via:</td>
    <td nowrap align="right">&nbsp;</td>
    <td><select name="IdTv">
      <?php
do {  
?>
      <option value="<?php echo $row_RecordsetTv['IdTv']?>"><?php echo $row_RecordsetTv['nombretv']?></option>
      <?php
} while ($row_RecordsetTv = mysql_fetch_assoc($RecordsetTv));
  $rows = mysql_num_rows($RecordsetTv);
  if($rows > 0) {
      mysql_data_seek($RecordsetTv, 0);
	  $row_RecordsetTv = mysql_fetch_assoc($RecordsetTv);
  }
?>
    </select></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  <tr valign="baseline">
    <td nowrap align="right">Proyecto:</td>
    <td nowrap align="right">&nbsp;</td>
    <td><select name="IdP">
      <?php
do {  
?>
      <option value="<?php echo $row_RecordsetPro['IdP']?>"><?php echo $row_RecordsetPro['nombrep']?></option>
      <?php
} while ($row_RecordsetPro = mysql_fetch_assoc($RecordsetPro));
  $rows = mysql_num_rows($RecordsetPro);
  if($rows > 0) {
      mysql_data_seek($RecordsetPro, 0);
	  $row_RecordsetPro = mysql_fetch_assoc($RecordsetPro);
  }
?>
    </select></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  <tr >
    <td >Inclinacion:</td>
    <td >&nbsp;</td>
    <td><input type="text" name="Inclinacion" value="" size="10"></td>
    <td>Grados</td>
    <td>&nbsp;</td>
  </tr>
  <tr valign="baseline">
    <td nowrap align="right">Persona :</td>
    <td nowrap align="right">&nbsp;</td>
    <td><select name="IdPer">
      <?php
do {  
?>
      <option value="<?php echo $row_RecordsetPer['IdPer']?>"><?php echo $row_RecordsetPer['nombre']?></option>
      <?php
} while ($row_RecordsetPer = mysql_fetch_assoc($RecordsetPer));
  $rows = mysql_num_rows($RecordsetPer);
  if($rows > 0) {
      mysql_data_seek($RecordsetPer, 0);
	  $row_RecordsetPer = mysql_fetch_assoc($RecordsetPer);
  }
?>
    </select></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  <tr valign="baseline">
    <td nowrap align="right">&nbsp;</td>
    <td nowrap align="right">&nbsp;</td>
    <td><input type="submit" value="Insertar registro"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    </table></td>
  </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form4">
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php
mysql_free_result($RecordsetTv);

mysql_free_result($RecordsetPro);

mysql_free_result($RecordsetPer);


?>
