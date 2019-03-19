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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form3")) {
  $insertSQL = sprintf("INSERT INTO anden (IdIv, AlturaBordillo, Ancho, costado, IdEs, IdTc) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['IdIv'], "int"),
                       GetSQLValueString($_POST['AlturaBordillo'], "text"),
                       GetSQLValueString($_POST['Ancho'], "text"),
                       GetSQLValueString($_POST['costado'], "int"),
                       GetSQLValueString($_POST['IdEs'], "int"),
                       GetSQLValueString($_POST['IdTc'], "int"));

  mysql_select_db($database_Conexion, $Conexion);
  $Result1 = mysql_query($insertSQL, $Conexion) or die(mysql_error());

  $insertGoTo = "SegundoAnden.php";
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
$query_RecordsetCos = "SELECT * FROM costado";
$RecordsetCos = mysql_query($query_RecordsetCos, $Conexion) or die(mysql_error());
$row_RecordsetCos = mysql_fetch_assoc($RecordsetCos);
$totalRows_RecordsetCos = mysql_num_rows($RecordsetCos);

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
echo "<script type=\"text/javascript\">alert(\"Insercion Correcta\");</script>";
?>
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
<!-- //Custom Theme files -->	

<!--web-fonts-->
	<link href='//fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Poppins:400,500,600' rel='stylesheet' type='text/css'>
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

								<li><a href="javascript:history.go(-1);">Atras</a></li>
							   <li><a href="listaObs.php" class="scroll">Agregar Obstaculos</a></li>
     
                                <li><a href="javascript:history.go(-1);">Atras</a></li>
				
							</ul>
				</div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
             <br>
            <br>
            <br><h1><span>Segundo Anden</span></h1>
            <br>
            <br>
            
            <img src="images/invasionvendedores3.jpg" width="347" height="156"/>
            <br>
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
<p>
  <input type="text" name="IdIv2" value="" size="32">
</p>
<form method="post" name="form3" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">Su Inventario es:</td>
      <td><input type="text" name="IdIv" value="<?php echo $row['IdIv']?>" readonly size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">AlturaBordillo:</td>
      <td><input type="text" name="AlturaBordillo" value="ej:12 Cm" onFocus="if (this.value=='ej:12 Cm') this.value='';" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Ancho:</td>
      <td><input type="text" name="Ancho" value="ej:12 Metros" onFocus="if (this.value=='ej:12 Metros') this.value='';" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Costado:</td>
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
      <td nowrap align="right">Estado:</td>
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
      <td nowrap align="right">Tipo Cobertura:</td>
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
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Insertar registro"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form3">
</form>

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
                  <?php 
			  $nombre= "Segundo anden"
			   ?>
                  
   <form id="formulario">
                
                        <table>
                            <tr>
                                <td>Título</td>
                                <td>
    <br/> <input type="text" class="form-control"  name="titulo" autocomplete="off" readonly value="<?php echo $nombre ?> "/></td>
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
            
             

<!--ARCHIVOS JAVASCRIPT DE BOOTSTRAP -->
   
     <link href="css/bootstrap.min.css" rel="stylesheet" />    						
    <script language="javascript" src="./mapas/js/jquery-1.7.2.min.js"></script>
    
    <script language="javascript" src="js/permission.js"></script> 
    <script language="javascript" src="js/actions-maps.js"></script> 	
     <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyBE6r1DjdVzEeb2-GCtVlkWLPFXnQeKKPg&callback=initialize"
    async defer></script> 
      					<script>
						
						
						 $("#btn_grabar").on("click", function(){
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
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php
mysql_free_result($RecordsetIv);

mysql_free_result($RecordsetCos);

mysql_free_result($RecordsetEs);

mysql_free_result($RecordsetTc);
?>
