
<?php
include(dirname(__FILE__).'/../bootstrap/unit.php');
require_once(dirname(__FILE__).'/../../lib/Herramientas.class.php');


$t = new lime_test(1,new lime_output_color());

$t->diag('Funcion Conversor de "," en "."');

$t->is(Herramientas::convnume('1212,12'),1212.12,'Conversion realizada');

//$t->include_ok('./bootstrap/funcnal.php','Archivo incluido correctamente');



?>