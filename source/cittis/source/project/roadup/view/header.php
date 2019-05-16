<?php
// Image
$image = AS_WWWROOT."images/background.jpg";
$pathProject = AS_PROJECTS . constant("nameProject") . '/wwwroot/images/';
switch (isset($_GET)){
    case getRequest('rural'):
        $image = $pathProject . 'rural/'.getRequest('rural').'.png';
        break;
    case getRequest('urbana'):
        $image = $pathProject . 'urbana/'.getRequest('urbana').'.png';
        break;
    case getRequest('mixto'):
        $image = $pathProject . 'mixto/'.getRequest('mixto').'.png';
        break;
}

$body->appendInnerHTML('<div class="page-header header-filter" data-parallax="true" style="background-size: contain;background-image: url('.$image.')">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <div class="brand text-center">
            <h1>Inventarios Viales</h1>
            <h3 class="title text-center">v2</h3>
          </div>
        </div>
      </div>
    </div>
  </div>');