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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form4")) {
  $insertSQL = sprintf("INSERT INTO anden (IdIv, NumeroAndenes, AlturaBordillo, Ancho, costado, `Numero Obstaculos`, IdEs, IdTc) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['IdIv'], "int"),
                       GetSQLValueString($_POST['NumeroAndenes'], "int"),
                       GetSQLValueString($_POST['AlturaBordillo'], "text"),
                       GetSQLValueString($_POST['Ancho'], "text"),
                       GetSQLValueString($_POST['costado'], "int"),
                       GetSQLValueString($_POST['NumeroObstaculos'], "int"),
                       GetSQLValueString($_POST['NumeroObstaculos'], "int"),
                       GetSQLValueString($_POST['IdEs'], "int"));

  mysql_select_db($database_Conexion, $Conexion);
  $Result1 = mysql_query($insertSQL, $Conexion) or die(mysql_error());

  $insertGoTo = "Anden.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_Conexion, $Conexion);
$query_RecordsetIv = "SELECT * FROM iv";
$RecordsetIv = mysql_query($query_RecordsetIv, $Conexion) or die(mysql_error());
$row_RecordsetIv = mysql_fetch_assoc($RecordsetIv);
$totalRows_RecordsetIv = mysql_num_rows($RecordsetIv);

mysql_select_db($database_Conexion, $Conexion);
$query_RecordsetEs = "SELECT * FROM estado";
$RecordsetEs = mysql_query($query_RecordsetEs, $Conexion) or die(mysql_error());
$row_RecordsetEs = mysql_fetch_assoc($RecordsetEs);
$totalRows_RecordsetEs = mysql_num_rows($RecordsetEs);

mysql_select_db($database_Conexion, $Conexion);
$query_RecordsetTc = "SELECT * FROM tipocobertura";
$RecordsetTc = mysql_query($query_RecordsetTc, $Conexion) or die(mysql_error());
$row_RecordsetTc = mysql_fetch_assoc($RecordsetTc);
$totalRows_RecordsetTc = mysql_num_rows($RecordsetTc);

mysql_select_db($database_Conexion, $Conexion);
$query_RecordsetObs = "SELECT * FROM obstaculos";
$RecordsetObs = mysql_query($query_RecordsetObs, $Conexion) or die(mysql_error());
$row_RecordsetObs = mysql_fetch_assoc($RecordsetObs);
$totalRows_RecordsetObs = mysql_num_rows($RecordsetObs);

mysql_select_db($database_Conexion, $Conexion);
$query_RecordsetList = "SELECT * FROM listaobstaculos";
$RecordsetList = mysql_query($query_RecordsetList, $Conexion) or die(mysql_error());
$row_RecordsetList = mysql_fetch_assoc($RecordsetList);
$totalRows_RecordsetList = mysql_num_rows($RecordsetList);

mysql_select_db($database_Conexion, $Conexion);
$query_RecordsetCos = "SELECT * FROM costado";
$RecordsetCos = mysql_query($query_RecordsetCos, $Conexion) or die(mysql_error());
$row_RecordsetCos = mysql_fetch_assoc($RecordsetCos);
$totalRows_RecordsetCos = mysql_num_rows($RecordsetCos);
echo "<script type=\"text/javascript\">alert(\"Insercion Correcta\");</script>";
?>
<?php require_once('Connections/Conexion.php'); ?>
<p>&nbsp;</p>
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
				<p class="phonenum two"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></p>
<p class="phonenum two one"><span class="glyphicon glyphicon-time" aria-hidden="true"></span><?php
ini_set('date.timezone', 'America/Bogota');

$time1 = date ('H:i:s', time());

$time2 = date ('Y-m-d, H:i:s', time());


echo date("g:i a",strtotime($time1));

print '<br>';

echo $time2.'<br>';
?>
<form method="post" name="form1" id="form1">
</form>
<p>&nbsp;</p>
<p>
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

								
								<li><a href="listaObs.php" class="scroll">Agregar Obstaculos</a></li>
                   
								<li><a href="SegundoAnden.php" class="scroll">Agregar Segundo Anden</a></li>
                                <li><a href="javascript:history.go(-1);">Atras</a></li>
				
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
            <br>
            <br>
            <br>
             <br>
            <br>
            <br>
            <br><h1><span>Anden</span></h1>
            <br>
            <br>
            
            <img src="images/invasionvendedores3.jpg" width="347" height="156"/>
            <br>
            <br>
            <div>
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
<p>&nbsp;</p>
<p>&nbsp;</p>
<form method="post" name="form4" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline">
      <td height="70" align="right" nowrap>Su Inventario es:</td>
      <td><input type="text" name="IdIv" value="<?php echo $row['IdIv']; ?>" readonly size="32"></td>
    </tr>
    <tr valign="baseline">
      <td height="71" align="right" nowrap>Número Andenes:</td>
      <td><input type="text" name="NumeroAndenes" value="" size="32" input maxlength="2"></td>
    </tr>
    <tr valign="baseline">
      <td height="61" align="right" nowrap>AlturaBordillo:</td>
      <td><input type="text" name="AlturaBordillo" value="ej:12 Cm" onFocus="if (this.value=='ej:12 Cm') this.value='';" size="32"input maxlength="2"></td>
    </tr>
    <tr valign="baseline">
      <td height="71" align="right" nowrap>Ancho:</td>
      <td><input type="text" name="Ancho" value="ej:12 Metros" onFocus="if (this.value=='ej:12 Metros') this.value='';" size="32" input maxlength="2"></td>
    </tr>
     <tr valign="baseline">
      <td height="64" align="right" nowrap>Número de Obstaculos:</td>
      <td><input type="text" name="NumeroObstaculos" value="" size="32" input maxlength="2"></td>
    </tr>
    <tr valign="baseline">
      <td height="67" align="right" nowrap>Costado:</td>
      <td><select name="costado">
       <option value="Seleccione">--Seleccione una opcion--</option>
        <?php 
do {  
?>
        <option value="<?php echo $row_RecordsetCos['IdCo']?>" ><?php echo $row_RecordsetCos['nombreCo']?></option>
        <?php
} while ($row_RecordsetCos = mysql_fetch_assoc($RecordsetCos));
?>
      </select></td>
    <tr>
    <tr valign="baseline">
      <td height="66" align="right" nowrap>Estado:</td>
      <td><select name="IdEs">
       <option value="Seleccione">--Seleccione una opcion--</option>
      
        <?php 
do {  
?>
        <option value="<?php echo $row_RecordsetEs['IdEs']?>" ><?php echo $row_RecordsetEs['nombre']?></option>
        <?php
} while ($row_RecordsetEs = mysql_fetch_assoc($RecordsetEs));
?>
      </select></td>
    <tr>
    <tr valign="baseline">
      <td height="59" align="right" nowrap>Tipo Cobertura:</td>
      <td><select name="IdTc">
      <option value="Seleccione">--Seleccione una opcion--</option>
        <?php 
do {  
?>
        <option value="<?php echo $row_RecordsetTc['IdTc']?>" ><?php echo $row_RecordsetTc['nombreTC']?></option>
        <?php
} while ($row_RecordsetTc = mysql_fetch_assoc($RecordsetTc));
?>
      </select></td>
    <tr>
    <tr valign="baseline">
      <td height="50" align="right" nowrap>&nbsp;</td>
      <td><input type="submit" value="Insertar registro"></td>
    </tr>
  </table>
  <input type="text" name="IdIv2" value="" size="32">
<input type="hidden" name="MM_insert" value="form4">
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<form method="post" name="form4" id="form4">
  <table align="center">
<tr valign="baseline">
  <td nowrap="nowrap" align="right">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
     
 <style>
      html, body, #map {
        height: 100%; 
		width:100%;
        margin: 0px;
        padding: 0px;
	  }
          #map {
        width: 500px;
        height: 500px;
      }
      #coords{width: 500px;}  
    </style>	
    				
  </head>
  <body>
   
   <div id="map">
    
   </div> 
   <br>
   <br>
    <div id="mapa" >
        <h2>Geolocalizacion </h2>
    </div>
    <div id="infor">
        <div class="accordion" id="accordion2">
            <div class="accordion-group">
              <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                  Agregar
                </a>
              </div>
              <div id="collapseOne" class="accordion-body collapse in">
                <div class="accordion-inner">
                
                  
   <form id="formulario">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
	$(function(){
  	$(document).on('change','#MySelect',function(){ //detectamos el evento change
    	var value = $(this).val();//sacamos el valor del select
      $('#titulo').val(value);//le agregamos el valor al input (notese que el input debe tener un ID para que le caiga el valor)
    });
  });

</script>

                        <table>
                            <tr>
                                <td>Título</td>
                              <td>
    <br/> <select id="MySelect">
    <option value="Borde del anden">Borde del anden</option>
    <option value="Segundo Borde del anden">Segundo Borde del anden</option>
    <option value="Inicio Paramento">Inicio Paramento</option>
    <option value="Fin Paramento">Fin Paramento</option>
    </select>
    <input type="text" id="titulo" class="form-control"  name="titulo" autocomplete="off" readonly />
    </td>
                            </tr>
                            <tr>
                                <td>Coordenada X</td>
                                <td><input type="text" id="coords" class="form-control" readonly  name="cx" autocomplete="off"/></td>
                            </tr>
                            <tr>
                                <td>Coordenada Y</td>
                                <td><input type="text" id="longitude" class="form-control"  readonly name="cy" autocomplete="off"/></td>
                            </tr>
                            <tr>
                                <td><button type="button" id="btn_grabar" class="btn btn-success btn-sm">Grabar</button></td>
                                <td><button type="button" class="btn btn-danger btn-sm">Cancelar</button></td>
                            </tr>
                        </table>
                        
                    </form>
                    </div>
              </div>
            </div>
   
       <script type="text/jscript" src="//code.jquery.com/jquery-3.3.1.min.js"></script>
            
  					<script> $("#btn_grabar").on("click", function(){
                    var  f = $("#formulario");
                    $.ajax({
                        data:f.serialize()+"&tipo=grabar",
                        type: "POST",
                        dataType: "JSON",
                        url: "iajax.php",
                        success:function(data){
                            alert(data.mensaje);
                        }, 
                        beforesend:function(){   
                        },
                        complete:function(){  
                        }
                    });
                     return false;  
                 });</script>
<!--ARCHIVOS JAVASCRIPT DE BOOTSTRAP -->
   
     <link href="css/bootstrap.min.css" rel="stylesheet" />    						
     
    <script language="javascript" src="./js/permission.js"></script> 
    <script language="javascript" src="./js/actions-maps.js"></script> 	
     <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyBE6r1DjdVzEeb2-GCtVlkWLPFXnQeKKPg&callback=initialize"
    async defer></script> 
<p>&nbsp;</p>
<?php

mysql_free_result($RecordsetList);

mysql_free_result($RecordsetCos);

mysql_free_result($RecordsetEs);

mysql_free_result($RecordsetTc);

mysql_free_result($RecordsetObs);

mysql_free_result($RecordsetIv);

?>
