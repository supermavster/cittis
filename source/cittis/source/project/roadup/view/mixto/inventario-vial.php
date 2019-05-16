<?php
// Logic
$pathMain = "";
$page = "Inventario Vial";
$title = "Mixto - $page";
$count = -1;
// Data Main
$data = [];

// Queries
$sql = "SELECT nombretv AS name FROM tipovia ";
$data['option'][++$count] = self::getValuesSQL($sql);

$sql = "SELECT nombrep AS name FROM proyecto ";
$data['option'][++$count] = self::getValuesSQL($sql);

$sql = "SELECT nombre AS name FROM persona ";
$data['option'][++$count] = self::getValuesSQL($sql);

//showElements($data);

// View
$count = 0;
$content = new HTMLTag('form',array(
    "action"=>getActualURL(),
    "method"=>"POST",
));
$content->appendInnerHTML('
<div class="mt-3 py-5 border-top text-center">
    <div class="row justify-content-center">
            <div class="col-lg-12">
                <table class="col-lg-12">
                    <tbody>
                    <tr>
                        <td>FECHA DE INICIO:</td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control datepicker"  value="'.date('m/d/Y').'">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>FECHA DE FIN:</td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control datepicker"  value="'.date('m/d/Y').'">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Via Principal:</td>
                        <td>
                            <select id="typeID" name="typeID" class="btn btn-secondary dropdown-toggle">
                                <option class="dropdown-item" selected>Seleccione...</option>                                   
                                <option class="dropdown-item" value="Carrera">Carrera</option>
                                <option class="dropdown-item" value="Calle">Calle</option>
                                <option class="dropdown-item" value="Transversal">Transversal</option>
                                <option class="dropdown-item" value="Diagonal">Diagonal</option>
                            </select>
                        </td>
                        <td><input type="text" class="form-control" value="" placeholder="Dirección" ></td>
                        <td><input type="text" class="form-control" value="" placeholder="#"></td>
                  </tr>
                  <tr>
                    <td>Tramo Inicio:</td>
                    <td>
                        <select id="typeID" name="typeID" class="btn btn-secondary dropdown-toggle">
                            <option class="dropdown-item" selected>Seleccione...</option>                                   
                            <option class="dropdown-item" value="Carrera">Carrera</option>
                            <option class="dropdown-item" value="Calle">Calle</option>
                            <option class="dropdown-item" value="Transversal">Transversal</option>
                            <option class="dropdown-item" value="Diagonal">Diagonal</option>
                        </select>
                    </td>
                    <td><input type="text" class="form-control" value="" placeholder="Dirección" ></td>
                    <td><input type="text" class="form-control" value="" placeholder="#"></td>
                  </tr>
                  <tr>
                    <td>TramoFin:</td>
                        <td>
                        <select id="typeID" name="typeID" class="btn btn-secondary dropdown-toggle">
                            <option class="dropdown-item" selected>Seleccione...</option>                                   
                            <option class="dropdown-item" value="Carrera">Carrera</option>
                            <option class="dropdown-item" value="Calle">Calle</option>
                            <option class="dropdown-item" value="Transversal">Transversal</option>
                            <option class="dropdown-item" value="Diagonal">Diagonal</option>
                        </select>
                    </td>
                    <td><input type="text" class="form-control" value="" placeholder="Dirección" ></td>
                    <td><input type="text" class="form-control" value="" placeholder="#"></td>
                  </tr>
                    <tr>
                        <td>Longitud Tramo:</td>
                        <td>
                            <div class="form-group">
                                <input class="form-control" name="idInventory" id="idInventory" placeholder="Ingrese su inventario" 
                                       type="text">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Tipo via:</td>
                        <td>
                            <div class="dropdown">
                              <select id="typeID" name="typeID" class="btn btn-secondary dropdown-toggle">
                                    <option class="dropdown-item" selected>Seleccione...</option>         
                                    '.$data['option'][$count++].'                                                   
                              </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Proyecto:</td>
                        <td>
                            <div class="dropdown">
                              <select id="typeID" name="typeID" class="btn btn-secondary dropdown-toggle">
                                    <option class="dropdown-item" selected>Seleccione...</option>         
                                    '.$data['option'][$count++].'                                                   
                              </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Inclinación:</td>
                        <td>
                            <div class="form-group">
                                <input class="form-control" name="idInventory" id="idInventory" placeholder="Ingrese su inventario" 
                                       type="text">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Persona:</td>
                        <td>
                            <div class="dropdown">
                              <select id="typeID" name="typeID" class="btn btn-secondary dropdown-toggle">
                                    <option class="dropdown-item" selected>Seleccione...</option>         
                                    '.$data['option'][$count++].'                                                   
                              </select>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr/>
            <button type="submit" class="btn btn-success btn-lg">Guardar</button>
            <a href="' . (!isset($_POST) ? getActualURL() : (URLWEB_FULL . DATA['pathMain'])) . '" class="btn btn-danger btn-lg">Cancelar</a>
        </div>
    </div>
</div>
');