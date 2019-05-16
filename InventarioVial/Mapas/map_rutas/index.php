<?php 
	include_once('class/config.php');
	include_once('class/google.php');
	$google = new Google;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Google Maps - Rutas</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/css/base.css">
	<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript" src="<?=BASE_URL?>/js/jquery.js"></script>
	<script type="text/javascript" src="<?=BASE_URL?>/js/functions.js"></script>
    
</head>
<body>
	<div class="container">
		<table class="table-elements">
			<tr>
				<td>
					<input type="button" value="Obtener mi ubicacion - A" onclick="get_my_location();" class="btn">
				</td>
				<td>
					<input type="text" placeholder="Latitud" id="my_lat" class="txt" readonly>
				</td>
				<td>
					<input type="text" placeholder="Longitud" id="my_lng" class="txt" readonly>
				</td>
				<td>
					<select class="txt" onchange="draw_rute(this.value)">
						<option value="0">Dibujar ruta con &#8595;</option>
						<?=$google->get_stores();?>
                        
					</select>
				</td>
			</tr>
		</table>
		<div class="map" id="map"></div>
	</div>
	<script type="text/javascript">
		start_map();
	</script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCHv-eC18jc0LRrrXRtKpDLFOQrpMuWYA"
    async defer></script>
</body>
</html>
