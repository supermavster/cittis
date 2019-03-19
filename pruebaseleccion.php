<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<script language="JavaScript">
function CambiarFormulario(){
	switch(document.forms[0].LISTA.selectedIndex){
		case 0: 
			document.forms[0].Texto1.disabled=false;
			document.forms[0].Texto2.disabled=true;	
			document.forms[0].Texto3.disabled=true;
			break;
		case 1: 
			document.forms[0].Texto1.disabled=true;
			document.forms[0].Texto2.disabled=true;	
			document.forms[0].Texto3.disabled=false;
			break;
		case 2: 
			document.forms[0].Texto1.disabled=true;
			document.forms[0].Texto2.disabled=false;	
			document.forms[0].Texto3.disabled=true;
			break;
	}
}

</script>


<body background="Design/BodyBackground.GIF" onLoad="CambiarFormulario();">
<form name="form1" method="post" action="">

<label id="prueba" name="prueba">mapas</label>
   
  <p>Seleccion: 
    <select name="LISTA" id="LISTA" onChange="CambiarFormulario()">
      <option selected>Opcion 1</option>
      <option>Opcion 2</option>
      <option>Opcion 3</option>
    </select>
  </p>
  
  <p>Texto1 
    <input name="Texto1" type="text" id="Texto1">
    <br>
    Texto2 
    <input name="Texto2" type="text" id="Texto2">
    <br>
    Texto3 
    <input name="Texto3" type="text" id="Texto3">
  </p>
  </form>
  <script> function cambiar(esto)
{
	vista=document.getElementById(esto).style.display;
	if (vista=='none')
		vista='block';
	else
		vista='none';

	document.getElementById(esto).style.display = vista;
}</script>  <button type="button"  class="btn btn-success btn-sm  a href="#" onClick="cambiar('ejemplo'); return false;"">Geolocalizar</a></button>
<div id="ejemplo" style="display: none;">
 <style>
	   #mapa{ 
	     width:400px; 
		 height:400px; 
		 float:left;
		 background:green;
		}
		
		#info{ 
	     width:400px; 
		 height:400px; 
		 float:left;
		}	
	</style>
      <!--<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBznjofyw3GV78ZSKkbiDXB7oGJ5SAc8Xo&sensor=TRUE v=3.exp&signed_in=true"></script>
    
    <script type="text/jscript" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
<!--ARCHIVOS JAVASCRIPT DE BOOTSTRAP -->
    <script type="text/jscript" src="js2/bootstrap.min.js"></script>
     <link href="css2/bootstrap.min.css" rel="stylesheet" />    
    <!--<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>-->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true&key=AIzaSyBNCH7_dWhD6PMwEDEAidD1UNDBS1dTMZ0"></script>
    
    <script type="text/jscript" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
<!--ARCHIVOS JAVASCRIPT DE BOOTSTRAP -->
    <script type="text/jscript" src="js2/bootstrap.min.js"></script>
	<script>
	
function mostrarErrores(error) {
    switch (error.code) {
        case error.PERMISSION_DENIED:
            alert('Permiso denegado por el usuario'); 
            break;
        case error.POSITION_UNAVAILABLE:
            alert('Posición no disponible');
            break; 
        case error.TIMEOUT:
            alert('Tiempo de espera agotado');
            break;
        default:
            alert('Error de Geolocalización desconocido :' + error.code);
    }
}

var opciones = {
    enableHighAccuracy: true,
    timeout: 10000,
    maximumAge: 1000
};
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
  
    <div id="mapa" >
        <h2>Aquí irá el mapa!</h2>
    </div>
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
              <?php 
			  $nombre= "prueba"
			   ?>
                    <form id="formulario">
                
                        <table>
                            <tr>
                                <td>Título</td>
                                <td>
    <br/> <input type="text" class="form-control"  name="titulo" autocomplete="off" readonly value="<?php echo $nombre ?> "/></td>
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
            <div class="accordion-group">
              <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                  Buscar
                </a>
              </div>
              <div id="collapseTwo" class="accordion-body collapse">
                <div class="accordion-inner">
                  ...
                </div>
              </div>
            </div>
            <div class="accordion-group">
              <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                  Eliminar
                </a>
              </div>
              <div id="collapseThree" class="accordion-body collapse">
                <div class="accordion-inner">
                  ...
                </div>
              </div>
            </div>
          </div>
    </div>
    
  
</form>

</head>

<body>
<br>
<br>
<br>
<br>
<br>
<br><br>
<br>
<br>



</div>
</body>
</html>