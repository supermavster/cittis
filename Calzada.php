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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO calzada (Ancho, Carriles, IdEs, IdSc, IdTc, IdIv, CalzadaParqueo) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Ancho'], "int"),
                       GetSQLValueString($_POST['Carriles'], "int"),
                       GetSQLValueString($_POST['IdEs'], "int"),
                       GetSQLValueString($_POST['IdSc'], "int"),
                       GetSQLValueString($_POST['IdTc'], "int"),
                       GetSQLValueString($_POST['IdIv'], "int"),
                       GetSQLValueString($_POST['CalzadaParqueo'], "int"));

  //mysql_select_db($database_Conexion, $Conexion);
  //$Result1 = mysql_query($insertSQL, $Conexion) or die(mysql_error());

  $insertGoTo = "InicioCicloRuta.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

$query_RecordsetEs = "SELECT * FROM estado";
$row_RecordsetEs = $Conexion->db_exec('fetch_assoc',$query_RecordsetEs);
$totalRows_RecordsetEs = $Conexion->db_exec('num_rows',$query_RecordsetEs);

$query_RecordsetSc = "SELECT * FROM sentidocirculacion";
$row_RecordsetSc = $Conexion->db_exec('fetch_assoc',$query_RecordsetSc);
$totalRows_RecordsetSc = $Conexion->db_exec('num_rows',$query_RecordsetSc);

$query_RecordsetTc = "SELECT * FROM tipocobertura";
$row_RecordsetTc = $Conexion->db_exec('fetch_assoc',$query_RecordsetTc);
$totalRows_RecordsetTc = $Conexion->db_exec('num_rows',$query_RecordsetTc);

$query_RecordsetIv = "SELECT * FROM iv";
$row_RecordsetIv = $Conexion->db_exec('fetch_assoc',$query_RecordsetIv);
$totalRows_RecordsetIv = $Conexion->db_exec('num_rows',$query_RecordsetIv);
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
$row = $Conexion->db_exec('fetch_row','SELECT MAX(IdIv) AS IdIv FROM iv');
echo isset($row['IdIv'])?$row['IdIv']:0;
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
                             	
								<li><a href="Berma.php" class="scroll">Agregar Berma</a></li>
                              
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
            <br>
            <br>
              <br>
            <br><h1><span>Calzada Rural</span></h1>
            <br>
            <br>
            <br>
            <br>
            <br>
            <img src="images/mg07-1.jpg" width="315" height="142"/><br /><br />
            <br>
            <br>
            <br>
            <div>
<form method="post" name="form2" action="<?php echo $editFormAction; ?>">
  <table align="center">
   <tr valign="baseline">
      <td height="97" align="right" nowrap="nowrap">Su Inventario es:</td>
      <td><input type="text" name="IdIv" value="<?php echo $row['IdIv']; ?>" readonly size="32"/></td></tr>
    <tr valign="baseline">
      <td height="125" align="right" nowrap>Ancho:</td>
      <td><span id="sprytextfield1">
        <input name="Ancho" type="text" class="glyphicon-sort-by-alphabet-alt" value="ej:1.250 Metros" onFocus="if (this.value=='ej:1.250 Metros') this.value='';" size="32" input maxlength="2" >
      <span class="textfieldRequiredMsg">Se necesita un valor.</span></span></td>
    </tr>
    
    <tr valign="baseline">
      <td height="95" align="right" nowrap>Carriles:</td>
      <td><span id="sprytextfield2">
        <input type="text" name="Carriles" value="" size="32" input maxlength="2">
        
      <span class="textfieldRequiredMsg">Se necesita un valor.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td height="95" align="right" nowrap>Calzadas de Parqueo:</td>
      <td><span id="sprytextfield2">
        <input type="text" name="CalzadaParqueo" value="" size="32" input maxlength="2">
        
      <span class="textfieldRequiredMsg">Se necesita un valor.</span></span></td>
    </tr>
    
    <tr valign="baseline">
      <td height="52" align="right" nowrap>Estado:</td>
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
    <tr>
    <tr valign="baseline">
      <td height="57" align="right" nowrap>Sentido circulacion:</td>
      <td><span id="spryselect2">
        <select name="IdSc">
        < <option value="Seleccione">--Seleccione una opcion--</option>
          <?php 
do {  
?>
          <option value="<?php echo $row_RecordsetSc['IdSc']?>" ><?php echo $row_RecordsetSc['NombreSc']?></option>
          <?php
} while ($row_RecordsetSc = mysql_fetch_assoc($RecordsetSc));
?>
        </select>
      <span class="selectRequiredMsg">Seleccione un elemento.</span></span><span id="sprycheckbox1"><span class="checkboxRequiredMsg">Realice una selección.</span></span></td>
    <tr>
    <tr valign="baseline">
      <td height="63" align="right" nowrap>Superficie de rodadura:</td>
      <td><span id="spryselect3">
        <select name="IdTc">
         <option value="Seleccione">--Seleccione una opcion--</option>
          <?php 
do {  
?>
          <option value="<?php echo $row_RecordsetTc['IdTc']?>" ><?php echo $row_RecordsetTc['nombreTC']?></option>
          <?php
} while ($row_RecordsetTc = mysql_fetch_assoc($RecordsetTc));
?>
        </select>
      <span class="selectRequiredMsg">Seleccione un elemento.</span></span></td>
    <tr>
   
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Insertar registro"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form2">
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
			  $nombre= "Calzada"
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
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
var sprycheckbox1 = new Spry.Widget.ValidationCheckbox("sprycheckbox1");
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3");
</script>
</body>
</html>

</div>