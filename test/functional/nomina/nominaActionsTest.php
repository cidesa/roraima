<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');
include(dirname(__FILE__).'/../../bootstrap/cidesaBrowser.php');

$b = new cidesaTestBrowser();   //Crea el obejto del navegador
$b->initialize();   //Inicializa el explorador de pruebas!!

///////////////CARGA DE LOS MODULOS////////////////////////////
$app='nomina';

include(dirname(__FILE__).'/../../obtenermenu.php');

foreach ($mod as  $m => $objm){
  $modulo=strtolower($objm);
  include(dirname(__FILE__).'/../../cargamodulo.php');
}
//////////////////////RECORRIDO//////////////////////////////////
