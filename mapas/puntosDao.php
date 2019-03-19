<?php
include_once 'conex.php';  //INCLUIR CONEXION DE BASE DE DATO
class puntosDao
{
    private $r;
    public function __construct()
    {
      $this->r = array();
    }
    public function grabar($titulo,$cx,$cy)//METODO PARA GRABAR
    {
        $con = conex::con();
        $titulo = mysql_real_escape_string($titulo);
        $cx = mysql_real_escape_string($cx);
        $cy = mysql_real_escape_string($cy);
        $q = "insert into localizacion (Titulo, cx, cy)".
             "values ('".addslashes($titulo)."','".addslashes($cx)."','".addslashes($cy)."')";
        $rpta = mysql_query($q, $con);
        mysql_close($con);
        if($rpta==1)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
 }
?>