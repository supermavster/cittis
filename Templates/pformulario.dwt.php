<?php require_once('../Connections/conexion.php'); ?>
<?php require_once('../Connections/conexion.php'); ?>
<?php require_once('../Connections/conexion.php'); ?>
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO calzada (IdCal, Ancho, NumCarriles, Separador, AnchoSep, Localizacion, IdAN, DobleCalzada, tipovia_IdTV, tipopavimento_IdTP, estado_IdES, iv_IdIV, iv_persona_IdP, iv_proyecto_IdPr, vehicular_IdV) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['IdCal'], "int"),
                       GetSQLValueString($_POST['Ancho'], "text"),
                       GetSQLValueString($_POST['NumCarriles'], "int"),
                       GetSQLValueString($_POST['Separador'], "text"),
                       GetSQLValueString($_POST['AnchoSep'], "int"),
                       GetSQLValueString($_POST['Localizacion'], "text"),
                       GetSQLValueString($_POST['IdAN'], "text"),
                       GetSQLValueString($_POST['DobleCalzada'], "text"),
                       GetSQLValueString($_POST['tipovia_IdTV'], "int"),
                       GetSQLValueString($_POST['tipopavimento_IdTP'], "int"),
                       GetSQLValueString($_POST['estado_IdES'], "int"),
                       GetSQLValueString($_POST['iv_IdIV'], "int"),
                       GetSQLValueString($_POST['iv_persona_IdP'], "int"),
                       GetSQLValueString($_POST['iv_proyecto_IdPr'], "int"),
                       GetSQLValueString($_POST['vehicular_IdV'], "int"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($insertSQL, $conexion) or die(mysql_error());

  $insertGoTo = "../formulario.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO calzada (Ancho, NumCarriles, Separador, AnchoSep, Localizacion, IdAN, DobleCalzada, tipovia_IdTV, tipopavimento_IdTP, estado_IdES, iv_persona_IdP, iv_proyecto_IdPr) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Ancho'], "text"),
                       GetSQLValueString($_POST['NumCarriles'], "int"),
                       GetSQLValueString($_POST['Separador'], "text"),
                       GetSQLValueString($_POST['AnchoSep'], "int"),
                       GetSQLValueString($_POST['Localizacion'], "text"),
                       GetSQLValueString($_POST['IdAN'], "text"),
                       GetSQLValueString($_POST['DobleCalzada'], "text"),
                       GetSQLValueString($_POST['tipovia_IdTV'], "int"),
                       GetSQLValueString($_POST['tipopavimento_IdTP'], "int"),
                       GetSQLValueString($_POST['estado_IdES'], "int"),
                       GetSQLValueString($_POST['iv_persona_IdP'], "int"),
                       GetSQLValueString($_POST['iv_proyecto_IdPr'], "int"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($insertSQL, $conexion) or die(mysql_error());

  $insertGoTo = "../formulario.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form3")) {
  $insertSQL = sprintf("INSERT INTO calzada (Ancho, NumCarriles, Separador, AnchoSep, Localizacion, IdAN, DobleCalzada, tipovia_IdTV, tipopavimento_IdTP, estado_IdES, iv_IdIV, iv_persona_IdP, iv_proyecto_IdPr, vehicular_IdV) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Ancho'], "text"),
                       GetSQLValueString($_POST['NumCarriles'], "int"),
                       GetSQLValueString($_POST['Separador'], "text"),
                       GetSQLValueString($_POST['AnchoSep'], "int"),
                       GetSQLValueString($_POST['Localizacion'], "text"),
                       GetSQLValueString($_POST['IdAN'], "text"),
                       GetSQLValueString($_POST['DobleCalzada'], "text"),
                       GetSQLValueString($_POST['tipovia_IdTV'], "int"),
                       GetSQLValueString($_POST['tipopavimento_IdTP'], "int"),
                       GetSQLValueString($_POST['estado_IdES'], "int"),
                       GetSQLValueString($_POST['iv_IdIV'], "int"),
                       GetSQLValueString($_POST['iv_persona_IdP'], "int"),
                       GetSQLValueString($_POST['iv_proyecto_IdPr'], "int"),
                       GetSQLValueString($_POST['vehicular_IdV'], "int"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($insertSQL, $conexion) or die(mysql_error());

  $insertGoTo = "../formulario.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_conexion, $conexion);
$query_Recordsettv = "SELECT * FROM tipovia";
$Recordsettv = mysql_query($query_Recordsettv, $conexion) or die(mysql_error());
$row_Recordsettv = mysql_fetch_assoc($Recordsettv);
$totalRows_Recordsettv = mysql_num_rows($Recordsettv);

mysql_select_db($database_conexion, $conexion);
$query_Recordsettp = "SELECT * FROM tipopavimento";
$Recordsettp = mysql_query($query_Recordsettp, $conexion) or die(mysql_error());
$row_Recordsettp = mysql_fetch_assoc($Recordsettp);
$totalRows_Recordsettp = mysql_num_rows($Recordsettp);

mysql_select_db($database_conexion, $conexion);
$query_Recordsetes = "SELECT * FROM estado";
$Recordsetes = mysql_query($query_Recordsetes, $conexion) or die(mysql_error());
$row_Recordsetes = mysql_fetch_assoc($Recordsetes);
$totalRows_Recordsetes = mysql_num_rows($Recordsetes);

mysql_select_db($database_conexion, $conexion);
$query_Recordsetiv = "SELECT * FROM iv";
$Recordsetiv = mysql_query($query_Recordsetiv, $conexion) or die(mysql_error());
$row_Recordsetiv = mysql_fetch_assoc($Recordsetiv);
$totalRows_Recordsetiv = mysql_num_rows($Recordsetiv);

mysql_select_db($database_conexion, $conexion);
$query_Recordsetper = "SELECT * FROM persona";
$Recordsetper = mysql_query($query_Recordsetper, $conexion) or die(mysql_error());
$row_Recordsetper = mysql_fetch_assoc($Recordsetper);
$totalRows_Recordsetper = mysql_num_rows($Recordsetper);

mysql_select_db($database_conexion, $conexion);
$query_Recordsetpro = "SELECT * FROM proyecto";
$Recordsetpro = mysql_query($query_Recordsetpro, $conexion) or die(mysql_error());
$row_Recordsetpro = mysql_fetch_assoc($Recordsetpro);
$totalRows_Recordsetpro = mysql_num_rows($Recordsetpro);

mysql_select_db($database_conexion, $conexion);
$query_Recordsetve = "SELECT * FROM vehicular";
$Recordsetve = mysql_query($query_Recordsetve, $conexion) or die(mysql_error());
$row_Recordsetve = mysql_fetch_assoc($Recordsetve);
$totalRows_Recordsetve = mysql_num_rows($Recordsetve);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- TemplateBeginEditable name="doctitle" -->
<title>Documento sin título</title>
<!-- TemplateEndEditable -->
<link href="../web/css/style.css" rel="stylesheet" type="text/css" />
<link href="../web/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="../web/css/component.css" rel="stylesheet" type="text/css" />
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <input type="hidden" name="iv_IdIV" value="" />
  <input type="hidden" name="vehicular_IdV" value="" />
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<form action="<?php echo $editFormAction; ?>" method="post" name="form2" id="form2">
  <input type="hidden" name="MM_insert" value="form2" />
</form>
<form action="<?php echo $editFormAction; ?>" method="post" name="form3" id="form3">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Ancho:</td>
      <td><input type="text" name="Ancho" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">NumCarriles:</td>
      <td><input type="text" name="NumCarriles" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Separador:</td>
      <td><input type="text" name="Separador" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">AnchoSep:</td>
      <td><input type="text" name="AnchoSep" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Localizacion:</td>
      <td><input type="text" name="Localizacion" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">IdAN:</td>
      <td><input type="text" name="IdAN" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">DobleCalzada:</td>
      <td valign="baseline"><table>
        <tr>
          <td><input type="radio" name="DobleCalzada" value="Si" />
            Si</td>
        </tr>
        <tr>
          <td><input type="radio" name="DobleCalzada" value="No" />
            No</td>
        </tr>
      </table></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Tipovia_IdTV:</td>
      <td><select name="tipovia_IdTV">
        <?php 
do {  
?>
        <option value="<?php echo $row_Recordsettv['IdTV']?>" ><?php echo $row_Recordsettv['Nombre']?></option>
        <?php
} while ($row_Recordsettv = mysql_fetch_assoc($Recordsettv));
?>
      </select></td>
    </tr>
    <tr> </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Tipopavimento_IdTP:</td>
      <td><select name="tipopavimento_IdTP">
        <?php 
do {  
?>
        <option value="<?php echo $row_Recordsettp['IdTP']?>" ><?php echo $row_Recordsettp['Nombre']?></option>
        <?php
} while ($row_Recordsettp = mysql_fetch_assoc($Recordsettp));
?>
      </select></td>
    </tr>
    <tr> </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Estado_IdES:</td>
      <td><select name="estado_IdES">
        <?php 
do {  
?>
        <option value="<?php echo $row_Recordsetes['IdES']?>" ><?php echo $row_Recordsetes['Nombre']?></option>
        <?php
} while ($row_Recordsetes = mysql_fetch_assoc($Recordsetes));
?>
      </select></td>
    </tr>
    <tr> </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Iv_IdIV:</td>
      <td><select name="iv_IdIV">
        <?php 
do {  
?>
        <option value="<?php echo $row_Recordsetiv['IdIV']?>" ><?php echo $row_Recordsetiv['IdIV']?></option>
        <?php
} while ($row_Recordsetiv = mysql_fetch_assoc($Recordsetiv));
?>
      </select></td>
    </tr>
    <tr> </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Iv_persona_IdP:</td>
      <td><select name="iv_persona_IdP">
        <?php 
do {  
?>
        <option value="<?php echo $row_Recordsetper['IdP']?>" ><?php echo $row_Recordsetper['NombreP']?></option>
        <?php
} while ($row_Recordsetper = mysql_fetch_assoc($Recordsetper));
?>
      </select></td>
    </tr>
    <tr> </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Iv_proyecto_IdPr:</td>
      <td><select name="iv_proyecto_IdPr">
        <?php 
do {  
?>
        <option value="<?php echo $row_Recordsetpro['IdPr']?>" ><?php echo $row_Recordsetpro['Nombre']?></option>
        <?php
} while ($row_Recordsetpro = mysql_fetch_assoc($Recordsetpro));
?>
      </select></td>
    </tr>
    <tr> </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Vehicular_IdV:</td>
      <td><select name="vehicular_IdV">
        <?php 
do {  
?>
        <option value="<?php echo $row_Recordsetve['IdV']?>" ><?php echo $row_Recordsetve['IdV']?></option>
        <?php
} while ($row_Recordsetve = mysql_fetch_assoc($Recordsetve));
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
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordsettv);



mysql_free_result($Recordsettp);

mysql_free_result($Recordsetes);

mysql_free_result($Recordsetiv);

mysql_free_result($Recordsetper);

mysql_free_result($Recordsetpro);

mysql_free_result($Recordsetve);
?>
