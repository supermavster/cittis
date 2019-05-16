<!DOCTYPE html>
<html>
<head>
<title>Reportes</title>
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
<!--//web-fonts-->

</head>

<body>
	<!-- main content start-->
     <!--start-home-->
	<div id="home" class="header">
			<!--start-header-->
            <div class="header-strip w3l">
			   <div class="container">
		
<?php
ini_set('date.timezone', 'America/Bogota');

$time1 = date ('H:i:s', time());

$time2 = date ('Y-m-d', time());


echo date("g:i a",strtotime($time1));

print '<br>';

echo $time2.'<br>';
?>

					

				<div class="clearfix"></div>
			  </div>
			</div>
		<div class="header-top w3l">
		  <div class="container">
		     <div class="logo"> <a href=""> <h1><img src="images/logo.png" alt=""> ITTUS <span>S.A</span></h1>
			 <p class="top-para"></p></a></div>
			
            <div class="main-nav">
			  <span class="menu"></span>
				  <div class="top-menu">
							 <ul class="nav navbar-nav cl-effect-14">
   

								
								<li><a href="Inicial.php" class="scroll">Cerrar</a></li>
     
								
								
								
							</ul>
				</div>
            </div>

	<!--End-top-nav-script-->
		<!--//end-header-->
		<div class="clearfix"></div>
    </div>
	</div>
      <!--start-banner-->
      <center>
      <span> Seleccione el reporte a descargar </span>
      <br>
      <br>
      <br>
      </center>
      <center>
   		 
		 <a href="Reportes/IndexCalzada.php">
		 <button type="button" class="btn btn-primary" onClick="" >Reporte Calzada</button>
		 </a>				
 
		 <a href="Reportes/IndexAnden.php">
		 <button type="button" class="btn btn-primary " onClick="" >Reporte Anden</button>
		 </a>
         
         <a href="Reportes/IndexObstaculos.php">
		 <button type="button" class="btn btn-primary " onClick="" >Reporte Lista Obstaculos</button>
		 </a>
         <a href="excel/reporte.php">
		 <button type="button" class="btn btn-primary " onClick="" >Reporte General</button>
		 </a>
         <a href="Reportes/index.php">
		 <button type="button" class="btn btn-primary " onClick="" >Reporte Inventarios</button>
		 </a>
         </center>		
</body>
</html>