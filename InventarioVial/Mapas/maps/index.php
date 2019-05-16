<!DOCTYPE html>
<html>
  <head>
    <title>Geolocation</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>       
      html, body, #map-canvas {
        height: 600px;
		width:600px;
        margin: 0px;
        padding: 0px;
      }
    </style>
    <script language="javascript" src="js/jquery-1.7.2.min.js"></script>
    <script language="javascript" src="js/fancywebsocket.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>

    <script>


var map;
var marker;

function initialize() 
{
  var mapOptions = {
    zoom: 16,
  };
  
  	map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);

	var pos = new google.maps.LatLng(60, 105);//Mi pocision
	 
	 var goldStar = {
		path: google.maps.SymbolPath.CIRCLE,
	    strokeColor: '#276ED0', 
		fillColor: '#276ED0',
		fillOpacity: .9,
		strokeWeight: 1,
		scale: 6,
  	};
 	var marker = new google.maps.Marker({
			position: pos,
			icon: goldStar,
			draggable: true,
			animation: google.maps.Animation.DROP,
			map: map,
  	});
	
	map.setCenter(pos);
	 
}

function animar(newpocision)//pasamos la nueva ubicacion del cliente
{

	var pedazo = newpocision.split(",");
	var pos = new google.maps.LatLng(pedazo[0], pedazo[1]);//Mi pocision
	var pos = pos;//otro lugar -> donde el usuario se localiza
		
 		var goldStar = {
			path: google.maps.SymbolPath.CIRCLE,
			strokeColor: '#FF4E51',
			fillColor: '#FF4E51',
			fillOpacity: .9,
			strokeWeight: 1,
			scale: 5,
  		};
		 var marker = new google.maps.Marker({
			position: pos,
			icon: goldStar,
			draggable: true,
			map: map
		  });		
		
	 var options = {//opciones de la nueva pocision
			map: map,
			position: pos,
		  };
		  
  map.setCenter(options.position);//pocisionamos el mapa al centro de la nueva locacion
}

function handleNoGeolocation(errorFlag) 
{
	  if (errorFlag) 
	  {
		var content = 'Error: The Geolocation service failed.';
	  } 
	  else 
	  {
		var content = 'Error: Your browser doesn\'t support geolocation.';
	  }
	
	  var infowindow = new google.maps.InfoWindow(options);
	  map.setCenter(options.position);
}


google.maps.event.addDomListener(window, 'load', initialize);

function pocision(newpocision)//recibimos la nueva pocision del socket
{
	animar(newpocision);//ejecutamos la funcion 
}


</script>
<!--ESTILOS DE BOOSTRAP -->
    <link href="../css2/bootstrap.min.css" rel="stylesheet" />    
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>

<!--ARCHIVOS JAVASCRIPT DE BOOTSTRAP -->
    <script type="text/jscript" src="../js2/bootstrap.min.js"></script>
	<script>
           //ARRAY PARA ALMACENAR NUEVOS MARCADORES 
           var marcadores_nuevos = [];

           //FUNCION PARA QUITAR MARCADORES DEL MAPA
           function quitar_marcador(lista)
           {
              for(i in lista)
             {
              //QUITAR MARCADOR DEL MAPA
              lista[i].setMap(null);
             }
           }     
	   $(document).on("ready",function(){

            var formulario = $("#formulario");

		  var punto = new google.maps.LatLng("10.431882","-66.9753432");
		 
		  //VARIABLE PARA CONFIGURCION INICIAL
		  var config = {
		    zoom:16,
		    center:punto,
		    mapTypeId: google.maps.MapTypeId.ROADMAP  
		  };
		  
		  //VARIABLE MAPA	
		  var mapa = new google.maps.Map($("#mapa")[0], config );
                  
		   google.maps.event.addListener (mapa, "click", function(event){
			 var coordenadas = event.latLng.toString();
			 coordenadas = coordenadas.replace("(", "");
                         coordenadas = coordenadas.replace(")", "");

			 var lista = coordenadas.split(",");

			var direccion = new google.maps.LatLng(lista[0],lista[1]);
                        
                        //PASAR LAS COORDENADAS AL FORMULARIO
                        formulario.find("input[name='cx']").val(lista[0]);
                        formulario.find("input[name='cy']").val(lista[1]);
                           //UBICAR EL FOCUS EN EL TITULO
                         formulario.find("input[name='titulo']").focus();
                        
			//VARIABLE PARA MARCADOR
			var marcador = new google.maps.Marker({
                            position:direccion, 
                            map:mapa, 
                            animation:google.maps.Animation.DROP, 
                            dagglabe:false                           
                        });
                        
                        // DEJAR SOLO UN MARCADOR EN EL MAP
                        marcadores_nuevos.push(marcador);
                        
                        //AGREGAR EVENTO CLICK AL MARCADOR
                        google.maps.event.addListener(marcador, "click", function(){
                        });     

                        quitar_marcador(marcadores_nuevos);
		        marcador.setMap(mapa);	 
		  });
		 
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
                 });
	   });
	</script>
   
  </head>
  <body>
    <div id="map-canvas"> </div>
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
                    <form id="formulario">
                        <table>
                            <tr>
                                <td>Título</td>
                                <td><input type="text" class="form-control"  name="titulo" autocomplete="off"/></td>
                            </tr>
                            <tr>
                                <td>Coordenada X</td>
                                <td><input type="text" class="form-control" readonly  name="cx" autocomplete="off"/></td>
                            </tr>
                            <tr>
                                <td>Coordenada Y</td>
                                <td><input type="text" class="form-control"  readonly name="cy" autocomplete="off"/></td>
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
  </body>
</html>