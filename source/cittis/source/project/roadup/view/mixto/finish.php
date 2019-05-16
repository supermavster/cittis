<form action="Index.php" method="post">
    <tr valign="baseline">
        <td nowrap="nowrap" align="right">Su Inventario es:</td>
        <td><input type="text" name="IdIv" id="IdIv" value="<?php echo $row['IdIv']; ?>" readonly size="32"/></td>
    </tr>
    <tr valign="baseline">
        <td nowrap align="right">FechaFin:</td>
        <td><input type="text" name="FechaFin" id="FechaFin" value="<?php echo $time2; ?>" size="32" readonly></td>
        <td><input type="submit" id="actualizar" name="btn_actualizar" value="actualizar"/></td>
        <a href="Reportes.php">
            <button type="button" class="btn btn-primary" onClick="" >Generar reportes</button>
        </a>
    </tr>
</form>