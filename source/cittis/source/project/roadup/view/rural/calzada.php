<?php
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
                        <td>Su inventario es:</td>
                        <td>
                            <div class="form-group">
                                <input class="form-control" name="idInventory" id="idInventory" placeholder="Ingrese su inventario" value="'.$data['id'].'" disabled="" 
                                       type="text">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Ancho:</td>
                        <td>
                            <div class="form-group">
                                <input class="form-control" name="anchor" id="anchor" placeholder="Ingrese el ancho"
                                       type="text">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Carriles:</td>
                        <td>
                            <div class="form-group">
                                <input class="form-control" name="carril" id="carril" placeholder="Ingrese los carriles"
                                       type="text">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Calzadas del Parqueo:</td>
                        <td>
                            <div class="form-group">
                                <input class="form-control" name="calzadas" id="calzadas" placeholder="Ingrese las calzadas del parqueo"
                                       type="text">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Estado:</td>
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
                        <td>Sentido circulación:</td>
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
                        <td>Superficie de rodadura:</td>
                        <td>
                            <div class="dropdown">
                              <select id="typeID" name="typeID" class="btn btn-secondary dropdown-toggle">
                                    <option class="dropdown-item" selected>Seleccione...</option>
                                    '.$data['option'][$count++].'
                              </select>
                            </div>
                        </td>
                    </tr>
                    <!-- Separator -->
                    <tr><td><hr/></td><td><hr/><td></td></tr>
                    <!--/ Separator -->
                   <tr>
                        <td style="width: 26%">
                            <table>
                                        <tbody>
                                            <tr>
                                                <td>Título:</td>
                                                <td>
                                                    <div class="form-group bmd-form-group is-filled">
                                                        <input class="form-control" name="titleLocation" id="titleLocation" value="'.DATA['page'].'" type="text">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Coordenada X:</td>
                                                <td>
                                                    <div class="form-group bmd-form-group">
                                                        <input class="form-control" name="locationX" id="locationX" placeholder="Ingreso de Coordenadas Y" type="text">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Coordenada Y:</td>
                                                <td>
                                                    <div class="form-group bmd-form-group">
                                                         <input class="form-control" name="locationX" id="locationX" placeholder="Ingreso de Coordenadas Y" type="text">
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                        </td>
                        <td>
                            Geolocalización:
                            <br>
                            <div id="map" style="height: 100px;"></div>
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