<!DOCTYPE html>
<html>
  <head> 

    <title>Geolocation</title>
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    
    
    <meta charset="utf-8">
    <style>
      html, body, #map {
        height: 100%; 
		width:100%;
        margin: 0px;
        padding: 0px;
	  }
          #map {
        width: 100%;
        height: 80%;
      }
      #coords{width: 500px;}  
    </style>								
  </head>
  <body>
   <div id="map">
    
   </div> 
   <br>
   <br>
<input type="text" id="titulo" readonly /><br>


   <label>Costado</label>
   <select name= "costado">
   <option value="Seleccione">--Seleccione una opcion--</option>
    
      </select>
   <input type="text" id="coords" readonly  />
  											
    <script language="javascript" src="js/jquery-1.7.2.min.js"></script>
    <script language="javascript" src="js/fancywebsocket.js"></script>
    <script language="javascript" src="../js/permission.js"></script> 
    <script language="javascript" src="../js/actions-maps.js"></script> 	
     <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyDCHv-eC18jc0LRrrXRtKpDLFOQrpMuWYA&callback=initialize"
    async defer></script>  
    </body>
</html>