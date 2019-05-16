<!DOCTYPE html>
<head>
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
    <title>ITTUS INVENTARIOS VIALES</title>
<!--mobile apps-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Dream up Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--mobile apps-->
<!--Custom Theme files -->
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all"> 
<link rel="stylesheet" type="text/css" href="css/component.css" />
<!-- //Custom Theme files -->	

<!--web-fonts-->
	<link href='//fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Poppins:400,500,600' rel='stylesheet' type='text/css'>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<!--//web-fonts-->

<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
</head>
<body>
	<!-- main content start-->
     <!--start-home-->
	<div id="home" class="header">
			<!--start-header-->
            <div class="header-strip w3l">
			   <div class="container">
			   <p class="phonenum"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> </p>
				<p class="phonenum two"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></p>
<p class="phonenum two one"><span class="glyphicon glyphicon-time" aria-hidden="true"></span><?php
ini_set('date.timezone', 'America/Bogota');

$time1 = date ('H:i:s', time());

$time2 = date ('Y-m-d, H:i:s', time());


echo date("g:i a",strtotime($time1));

print '<br>';

echo $time2.'<br>';
?>
<?php
// realizamos la conexión a la base de datos
  $user = 'root'; 
  $pass = ''; 
  $host = 'localhost'; 
  $db = 'inventariovial'; 
  $config = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'");
  try
  {
      $conn = new PDO("mysql:host=$host;dbname=$db;", $user, $pass, $config);
  }
  catch(PDOException $e)
  {
      echo $e -> getMessage();
  }

  // realizamos la consulta para obtener el mayor id insertado
  $sql = "SELECT MAX(IdIv) AS IdIv FROM iv";
  $query = $conn->prepare($sql);
  $query->execute();
  $row = $query->fetch();
 
  // imprimimos el valor obtenido, en este caso el mayor id insertado en una tabla
   
 echo $row['IdIv'];
 
 
?><p>&nbsp;</p>
<p>
				<div class="clearfix"></div>
			  </div>
			</div>
		<div class="header-top w3l">
		  <div class="container">
		     <div class="logo"> <a href="Danos.php"> <h1><img src="images/logo.png" alt=""> ITTUS <span>Inventarios viales</span></h1>
			 <p class="top-para"></p></a></div>
			
<div class="main-nav">
			  <span class="menu"></span>
				  <div class="top-menu">
							 <ul class="nav navbar-nav cl-effect-14">

								<li><a href="javascript:history.go(-1);">Atras</a></li>
								<li><a href="Interseccion.php" class="scroll">Agregar Interseccion</a></li>
                                <li><a href="Index.php" class="scroll">Finalizar Proceso</a></li>
				
							</ul>
				</div>
            </div>
<!--ESTILOS DE BOOSTRAP -->
    <link href="css2/bootstrap.min.css" rel="stylesheet" />    
    <!--<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>-->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyDCHv-eC18jc0LRrrXRtKpDLFOQrpMuWYA"></script>
    
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

</body>
</html>