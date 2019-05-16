<?php
$body->appendInnerHTML("<!-- Scripts -->");

$scripts = array(
    "core/jquery.min.js",
    "core/popper.min.js",
    "core/bootstrap-material-design.min.js",
    "plugins/moment.min.js",
    "plugins/bootstrap-datetimepicker.js",
    "plugins/nouislider.min.js",
    "plugins/bootstrap-tagsinput.js",
    "plugins/bootstrap-selectpicker.js",
    "plugins/jasny-bootstrap.min.js",
    "plugins/jquery.flexisel.js",
    "material-kit.js?v=2.1.0",
);



foreach ($scripts as $value) {
    $body->appendChild(new HTMLTag('script', array(
        "type" => "text/javascript",
        'src' => AS_ASSETS . 'assets/js/' . $value,
    )));
}


$body->appendInnerHTML('
<script>
    $(document).ready(function() {
      //init DateTimePickers
      materialKit.initFormExtendedDatetimepickers();
      });
</script>
');

//Complements
//require_once AS_VIEW.'complements/all.php';
