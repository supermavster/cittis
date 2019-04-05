<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_Conexion = "cittis.com.co";
$database_Conexion = "cittisco_inventariovial";
$username_Conexion = "cittisco_SystemsTeamCittis";
$password_Conexion = "S@eKQ^?3a&vm";
$Conexion = mysql_pconnect($hostname_Conexion, $username_Conexion, $password_Conexion) or trigger_error(mysql_error(),E_USER_ERROR); 
?>