<?php
class conexiones {
function recuperadatos(){
$host= "localhost";
$user = "root";
$pw = "";
$db = "inventariovial";



$con = mysql_connect($host,$user,$pw) or die("No se puede conectar");
mysql_select_db($db,$con) or die ("No se encontro la base de datos");
$query = "SELECT MAX(IdIv) as total FROM iv";
$resultado = mysql_query($query);
 while ($fila = mysql_fetch_array($resultado)){
	 echo "$fila[IdIv]";
	 


 
	 }
}
	
}




?>