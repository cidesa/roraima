<?php
<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');
include(dirname(__FILE__).'/../../bootstrap/cidesaBrowser.php');

$b = new cidesaTestBrowser();   //Crea el obejto del navegador
$b->initialize();   //Inicializa el explorador de pruebas!!

///////////////CARGA DE LOS MODULOS////////////////////////////
$app='bienes';

include(dirname(__FILE__).'/../../obtenermenu.php');

//print_r($mod);exit;

foreach ($mod as $m => $objm){
  $modulo=strtolower($objm);
  include(dirname(__FILE__).'/../../cargamodulo.php');
}
//////////////////////RECORRIDO//////////////////////////////////

include(dirname(__FILE__).'/../../bootstrap/functional.php');
include(dirname(__FILE__).'/../../bootstrap/cidesaBrowser.php');

$b = new cidesaTestBrowser();   //Crea el obejto del navegador
$b->initialize();   //Inicializa el explorador de pruebas!!

///////////////CARGA DE LOS MODULOS////////////////////////////
$app='bienes';

include(dirname(__FILE__).'/../../obtenermenu.php');

//print_r($mod);exit;

foreach ($mod as $m => $objm){
  $modulo=strtolower($objm);
  include(dirname(__FILE__).'/../../cargamodulo.php');
}
//////////////////////RECORRIDO//////////////////////////////////
