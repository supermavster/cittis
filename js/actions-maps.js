// JavaScript Documentvar map;
if (navigator.geolocation)
{
	// Código de la aplicación
}
else
{
	// No hay soporte para la geolocalización: podemos desistir o utilizar algún método alternativo
}

 
var marker;
var coords = {};    //coordenadas obtenidas con la geolocalización

function initialize() 
{
  var mapOptions = {
    zoom: 30,//zoom empieza el mapa
  };
  
  map = new google.maps.Map(document.getElementById('map'),mapOptions);//creamos un nuevo objeto de las librerias

  // Try HTML5 geolocation
  if(navigator.geolocation) //si acepta la geolocalizacion
  {
    	navigator.geolocation.getCurrentPosition(function(position)
		{
      		var pos = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);//generamos una nueva pocision en 
			//formato  latitude,longitude
				 
	 var goldStar = {//creamos las propiedades para un nuevo marcador
		path: google.maps.SymbolPath.CIRCLE,
	    strokeColor: '#276ED0',
		fillColor: '#276ED0',
		fillOpacity: .9,
		strokeWeight: 1,
		scale: 6,
  	};
 	marker = new google.maps.Marker({//creamos un nuevo marcador con las propiedades de goldstar
			position: pos,//lo pocisionamos con alguna ubicacion
			icon: goldStar,//con las propiedades previemente creadas
			draggable: true,//le dmos la propiedad de arrastrar el marcador
			animation: google.maps.Animation.DROP,//propiedad de animacion
			map: map,
  	});
		setDrawMarker(marker);

	map.setCenter(pos);//pocisionamos el marcador en el centro
	  

    }, function() //excepciones
	{
      handleNoGeolocation(true);
    });
  } 
  else 
  {
    // Browser doesn't support Geolocation
    handleNoGeolocation(false);
  }
}

function animar()//funcion crea un nuevo marcador en el mapa
{
	navigator.geolocation.getCurrentPosition(function(position) 
	{
      				
	var pos = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
			
    map.panTo(pos);
	
 		var goldStar = {
			path: google.maps.SymbolPath.CIRCLE,
			strokeColor: '#FF4E51',
			fillColor: '#FF4E51',
			fillOpacity: .9,
			strokeWeight: 1,
			scale: 5,
  		};
		   marker = new google.maps.Marker({
			position: pos,
			icon: goldStar,
			draggable: true,
			map: map
			});		
			
			setDrawMarker(marker);

	 var options = {//opciones de la nueva pocision
			map: map,
			position: pos,
		  };
		  
	send(position.coords.latitude+","+position.coords.longitude);	//enviamos al socket la nueva pocision	  
  	//var infowindow = new google.maps.InfoWindow(options);ventana con informacion
  	map.setCenter(options.position);//pocisionamos el mapa al centro de la nueva locacion
  
  });
}

function setDrawMarker(markerTemp) {
	//agregamos un evento al marcador junto con la funcion callback al igual que el evento dragend que indica 
      //cuando el usuario a soltado el marcador
      markerTemp.addListener('click', toggleBounce);
      
      markerTemp.addListener( 'dragend', function (event)
      {
        //escribimos las coordenadas de la posicion actual del marcador dentro del input #coords
				document.getElementById("coords").value = this.getPosition().lat();
				document.getElementById("longitude").value = this.getPosition().lng();
				
      });
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
	
	  var options = {
		map: map,
		position: new google.maps.LatLng(60, 105),
		content: content
	  };
	
	  var infowindow = new google.maps.InfoWindow(options);
	  map.setCenter(options.position);
}


//google.maps.event.addDomListener(window, 'load', initialize);

setTimeout(function(){animar()}, 10000);//cada 5 segundos extraemos la ubicacion nuevamente

function pocision(pos)
{
}

/*
window.onfocus=function(event)
{
    if(event.explicitOriginalTarget===window)
	{
		cargarnotificacionesprueba(animar());
    }
}
 */
 
var timestamp=new Date().getTime();//si el usuario cambia de ventana, al momento de regresar el foco a nuestra
//aplicacion lanzara la nueva ubicacion
function checkResume()
{
    var current=new Date().getTime();
    if(current-timestamp>100)
    {
        var event=document.createEvent("Events");
        event.initEvent("focus",true,true);
        document.dispatchEvent(event);
    }
    timestamp=current;
}

window.setInterval(checkResume,1);
document.addEventListener("focus",function()
{
    animar();
},false);

//Nuevo codigo

 
//callback al hacer clic en el marcador lo que hace es quitar y poner la animacion BOUNCE
function toggleBounce() {
  if (marker.getAnimation() !== null) {
    marker.setAnimation(null);
  } else {
    marker.setAnimation(google.maps.Animation.BOUNCE);
  }
}
