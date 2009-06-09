 <?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
 <?php

  echo Catalogo($fcreginm,0,array(
  'getprincipal' => 'getRifrep',
  'getsecundario' => 'getNomconrep',
  //cajitas abajo
  'campoprincipal' => 'rifrep',
  'camposecundario' => 'nomconrep',
  'campobase' => 'id'
  ), 'Facpicsollic_Rifrep', 'fcconrep', '','',''); ?>