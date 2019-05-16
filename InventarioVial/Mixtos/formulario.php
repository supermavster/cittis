<?php require_once('Connections/Conexion.php'); ?>

<form action="prueba.php" name="ejemplo">

 <tr valign="baseline">
      <td nowrap align="right">ViaPrin:</td>
      <td>
      <select name="Calles" id="Calles">
        <option value="Carrera">Carrera</option>
        <option value="Calle">Calle</option>
        <option value="Transversal">Transversal</option>
        <option value="Diagonal">Diagonal</option>
      </select>        
      <input type="text" name="ViaPrin" value="" size="32">
      
       <input type="submit" value="enviar" onClick="javascript:procesar();"/>
       <input type="hidden" id="final" />
</td>
     
    </tr>
    </form>