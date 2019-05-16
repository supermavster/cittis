<?php
// Data
if(!isset(DATA['title'])) {
    $title = 'Bienvenido a Inventario Vial tambien conocido como RoadUp';
}else{
    $title = DATA['title'];
}
$content = new HTMLTag('div');

if(isset($_GET)){
    $body->appendAttributes(array("class"=>"profile-page sidebar-collapse"));
}

switch (isset($_GET)){
    case getRequest('rural'):
        require_once 'rural/'.getRequest('rural').'.php';
        break;
    case getRequest('urbana'):
        require_once 'urbana/'.getRequest('urbana').'.php';
        break;
    case getRequest('mixto'):
        require_once 'mixto/'.getRequest('mixto').'.php';
        break;
}

$body->appendInnerHTML('<div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <h2 class="title">'.$title.'</h2>
        '.$content->asHTML().'
      </div>
    </div>
  </div>');