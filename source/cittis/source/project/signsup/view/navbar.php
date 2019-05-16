<?php

$body->appendInnerHTML('
<nav class="navbar navbar-color-on-scroll navbar-transparent fixed-top navbar-expand-lg" color-on-scroll="100">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="'.URLWEB_FULL.'">'.constant('Title').'</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <!-- Options -->
        
      <!-- Nav -->
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
        <!-- Items -->
        <li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <i class="material-icons">apps</i> Calzada Urbana
            </a>
            <div class="dropdown-menu dropdown-with-icons">
              
                    <a class="dropdown-item" href="CalzadaUrbana.php">Urbana</a>
                    <a class="dropdown-item" href="Anden.php">Anden</a>
                    <a class="dropdown-item" href="BiciCarril.php">Bicicarril</a>
                    <a class="dropdown-item" href="Cuneta.php">Cuneta</a>
                    <a class="dropdown-item" href="Danos.php">Daños</a>
                    <a class="dropdown-item" href="Interseccion.php">Interseccion</a>
                    <a class="dropdown-item" href="listaObs.php">Obstaculos</a>
                    <a class="dropdown-item" href="listaSuelo.php">Usos de suelo</a>
                    <a class="dropdown-item" href="Puente.php">Puentes</a>
                    <a class="dropdown-item" href="Sumidero.php">Sumidero</a>
                    <a class="dropdown-item" href="Separador.php">Separador</a>
                    <a class="dropdown-item" href="pruebaseleccion.php">Prueba mapas </a>
            </div>
          </li>
        <!-- Items -->
        <li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <i class="material-icons">apps</i> Calzada Rural
            </a>
            <div class="dropdown-menu dropdown-with-icons">
              
               <a class="dropdown-item" href="Alcantarillas.php">Alcantarillas</a>
                    <a class="dropdown-item" href="Berma.php">Berma</a>
                    <a class="dropdown-item" href="Muros.php">Muros</a>
                    <a class="dropdown-item" href="SistemaContencion.php">Sistema de contencion</a>
                    <a class="dropdown-item" href="Cuneta.php">Cuneta</a>
                    <a class="dropdown-item" href="Peaje.php">Peaje</a>
                    <a class="dropdown-item" href="Pesaje.php">Pesaje</a>
                    <a class="dropdown-item" href="Puente.php">Puente</a>
                    <a class="dropdown-item" href="Ponton.php">Ponton</a>
                    <a class="dropdown-item" href="Talud.php">Talud</a>
                    <a class="dropdown-item" href="PuntosCriticos.php">Puntos Criticos</a>
                    <a class="dropdown-item" href="Danos.php">Daños</a>
                    <a class="dropdown-item" href="Interseccion.php">Interseccion</a>
                     <a class="dropdown-item" href="SumideroRural.php">Sumidero</a>
                    <a class="dropdown-item" href="Tunel.php">Tunel</a>
              
            </div>
          </li>
          <!-- Item -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="material-icons">apps</i> Template
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
');
