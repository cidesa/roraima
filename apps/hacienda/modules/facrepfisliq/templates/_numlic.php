 <?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
 <?php

$id="+'&fecha='+$('fcrepfis_fecrep').value";

 echo Catalogo($fcrepfis,1,array(
  'getprincipal' => 'getNumlic',
  'getsecundario' => 'getNomneg',
  //cajitas abajo
  'campoprincipal' => 'numlic',
  'camposecundario' => 'nomNeg',
  'campobase' => 'id',
  'tamanoprincipal' => '10',
  ), 'Facrepfisliq_Numlic', 'fcsollic', '', $id,'divGrid','1'); ?>
