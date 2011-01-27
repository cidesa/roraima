<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');
include(dirname(__FILE__).'/../../bootstrap/cidesaBrowser.php');
ini_set("memory_limit",'-1');
ini_set("max_execution_time",'300');
$b = new cidesaTestBrowser();   //Crea el objeto del navegador
$b->initialize();   //Inicializa el explorador de pruebas!!

///////////////CARGA DE LOS MODULOS////////////////////////////
$app='contabilidad';

include(dirname(__FILE__).'/../../obtenermenu.php');

foreach ($mod as  $m => $objm){
  $modulo=strtolower($objm);
  include(dirname(__FILE__).'/../../cargamodulo.php');
}

//////////////////////RECORRIDO//////////////////////////////////

?>

