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
  $insertSQL = sprintf("INSERT INTO bicicarril (Ancho, Localizacion, NumCarriles, IdEs, IdTs, IdSc, IdTc) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Ancho'], "text"),
                       GetSQLValueString($_POST['Localizacion'], "text"),
                       GetSQLValueString($_POST['NumCarriles'], "int"),
                       GetSQLValueString($_POST['IdEs'], "int"),
                       GetSQLValueString($_POST['IdTs'], "int"),
                       GetSQLValueString($_POST['IdSc'], "int"),
                       GetSQLValueString($_POST['IdTc'], "int"));

  //mysql_select_db($database_Conexion, $Conexion);
  //$Result1 = mysql_query($insertSQL, $Conexion) or die(mysql_error());
  $Result1 = $Conexion->db_exec('query', $insertSQL);

  $insertGoTo = "Index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form3")) {
  $insertSQL = sprintf("INSERT INTO bicicarril (Ancho, Localizacion, NumCarriles, IdEs, IdTs, IdSc, IdTc, IdIv) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Ancho'], "text"),
                       GetSQLValueString($_POST['Localizacion'], "text"),
                       GetSQLValueString($_POST['NumCarriles'], "int"),
                       GetSQLValueString($_POST['IdEs'], "int"),
                       GetSQLValueString($_POST['IdTs'], "int"),
                       GetSQLValueString($_POST['IdSc'], "int"),
                       GetSQLValueString($_POST['IdTc'], "int"),
                       GetSQLValueString($_POST['IdIv'], "int"));

  //mysql_select_db($database_Conexion, $Conexion);
  //$Result1 = mysql_query($insertSQL, $Conexion) or die(mysql_error());
  $Result1 = $Conexion->db_exec('query', $insertSQL);

  $insertGoTo = "Index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

$query_RecordsetEs = "SELECT * FROM estado";
$row_RecordsetEs =  $Conexion->db_exec('fetch_assoc',$query_RecordsetEs);
$totalRows_RecordsetEs =  $Conexion->db_exec('num_rows',$RecordsetEs);

$query_RecordsetTs = "SELECT * FROM tiposegregacion";
$row_RecordsetTs =  $Conexion->db_exec('fetch_assoc',$query_RecordsetTs);
$totalRows_RecordsetTs =  $Conexion->db_exec('num_rows',$query_RecordsetTs);

$query_RecordsetSc = "SELECT * FROM sentidocirculacion";
$row_RecordsetSc =  $Conexion->db_exec('fetch_assoc',$query_RecordsetSc);
$totalRows_RecordsetSc =  $Conexion->db_exec('num_rows',$query_RecordsetSc);

$query_RecordsetTc = "SELECT * FROM tipocobertura";
$row_RecordsetTc =  $Conexion->db_exec('fetch_assoc',$query_RecordsetTc);
$totalRows_RecordsetTc =  $Conexion->db_exec('num_rows',$query_RecordsetTc);

$query_RecordsetIv = "SELECT * FROM iv";
$row_RecordsetIv =  $Conexion->db_exec('fetch_assoc',$query_RecordsetIv);
$totalRows_RecordsetIv =  $Conexion->db_exec('num_rows',$query_RecordsetIv);
echo "<script type=\"text/javascript\">alert(\"Insercion Correcta\");</script>";
?><!DOCTYPE html>
<html>
<head>
<title>ITTUS INVENTARIOS VIALES</title>
<!--mobile apps-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
<meta name="keywords" content="Dream up Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola, Huawei web design" />
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
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="icon/css/fontello.css">

<!--//web-fonts-->
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all"> 
<link rel="stylesheet" type="text/css" href="css/component.css" />
<link href="css/estilos.css" type="text/css" rel="stylesheet" media="all"> 
<!-- //Custom Theme files -->	

<!--web-fonts-->
	<link href='//fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Poppins:400,500,600' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="icon/css/fontello.css">

<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
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
$row = $Conexion->db_exec('fetch_row','SELECT MAX(IdIv) AS IdIv FROM iv');
echo isset($row['IdIv'])?$row['IdIv']:0;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
</p>
					

				<div class="clearfix"></div>
			  </div>
			</div>
		<div class="header-top w3l">
		  <div class="container">
		     <div class="logo"> <a href="Danos.php"> <h1><img src="images/logo.png" alt=""> ITTUS <span>Inventarios viales</span></h1>
			 <p class="top-para"></p></a></div>
<br />
<br />
			
            <div class="main-nav">
			  <span class="menu"></span>
				  <div class="top-menu">
							 <ul class="nav navbar-nav cl-effect-14">

								
								<li><a href="Index.php" class="scroll">Finalizar Proceso</a></li>
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
            <br><h1><span>BiciCarril</span></h1>
            <br>
            <br>
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
            <img src="images/Cicloruta.jpg" width="315" height="142"/><br /><br />
            <div>
<form action="<?php echo $editFormAction; ?>" method="post" name="form3" id="form3">
  <table align="center">
  <tr valign="baseline">
      <td height="91" align="right" nowrap="nowrap">Su Inventario es:</td>
      <td><input type="text" name="IdIv" value="<?php echo $row['IdIv']; ?>" readonly size="32"/></td>
    </tr>
    <tr valign="baseline">
      <td height="86" align="right" nowrap="nowrap">Ancho:</td>
      <td><span id="sprytextfield1">
        <input type="text" name="Ancho" value="ej:1.250 Metros" onFocus="if (this.value=='ej:1.250 Metros') this.value='';" size="32" input maxlength="2"/>
      <span class="textfieldRequiredMsg">Se necesita un valor.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td height="60" align="right" nowrap="nowrap">Localizacion:</td>
      <td><select name="Localizacion" id="bicicarril">
       <option value="Seleccione">--Seleccione una opcion--</option>
        <option value="Anden">Anden </option>
        <option value="Calzada">Calzada</option>
      </select>      <span id="sprytextfield2">
         <td nowrap align="right">&nbsp;</td>
      <span class="textfieldRequiredMsg">Se necesita un valor.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td height="93" align="right" nowrap="nowrap">Número Carriles:</td>
      <td><span id="sprytextfield3">
        <input type="text" name="NumCarriles" value="" size="32" input maxlength="2" />
      <span class="textfieldRequiredMsg">Se necesita un valor.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td height="59" align="right" nowrap="nowrap">Estado:</td>
      <td><span id="spryselect1">
        <select name="IdEs">
         <option value="Seleccione">--Seleccione una opcion--</option>
          <?php 
do {  
?>
          <option value="<?php echo $row_RecordsetEs['IdEs']?>" ><?php echo $row_RecordsetEs['nombre']?></option>
          <?php
} while ($row_RecordsetEs = mysql_fetch_assoc($RecordsetEs));
?>
        </select>
      <span class="selectRequiredMsg">Seleccione un elemento.</span></span></td>
    </tr>
    <tr> </tr>
    <tr valign="baseline">
      <td height="62" align="right" nowrap="nowrap">Tipo Segregacion:</td>
      <td><span id="spryselect2">
        <select name="IdTs">
         <option value="Seleccione">--Seleccione una opcion--</option>
          <?php 
do {  
?>
          <option value="<?php echo $row_RecordsetTs['IdTs']?>" ><?php echo $row_RecordsetTs['NombreTs']?></option>
          <?php
} while ($row_RecordsetTs = mysql_fetch_assoc($RecordsetTs));
?>
        </select>
      <span class="selectRequiredMsg">Seleccione un elemento.</span></span></td>
    </tr>
    <tr> </tr>
    <tr valign="baseline">
      <td height="47" align="right" nowrap="nowrap">Sentido de Circulacion:</td>
      <td><span id="spryselect3">
        <select name="IdSc">
         <option value="Seleccione">--Seleccione una opcion--</option>
        
          <?php 
do {  
?>
          <option value="<?php echo $row_RecordsetSc['IdSc']?>" ><?php echo $row_RecordsetSc['NombreSc']?></option>
          <?php
} while ($row_RecordsetSc = mysql_fetch_assoc($RecordsetSc));
?>
        </select>
      <span class="selectRequiredMsg">Seleccione un elemento.</span></span></td>
    </tr>
    <tr> </tr>
    <tr valign="baseline">
      <td height="45" align="right" nowrap="nowrap">Tipo Cobertura:</td>
      <td><span id="spryselect4"><span class="selectRequiredMsg">Seleccione un elemento.</span></span>
        <select name="IdTc">
         <option value="Seleccione">--Seleccione una opcion--</option>
          <?php 
do {  
?>
          <option value="<?php echo $row_RecordsetTc['IdTc']?>" ><?php echo $row_RecordsetTc['nombreTC']?></option>
          <?php
} while ($row_RecordsetTc = mysql_fetch_assoc($RecordsetTc));
?>
      </select></td>
    </tr>
    <tr> </tr>
    
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Insertar registro" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form3" />
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
			  $nombre= "BiciCarril"
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
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none");
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3");
var spryselect4 = new Spry.Widget.ValidationSelect("spryselect4");
</script>
</body>
</html>
