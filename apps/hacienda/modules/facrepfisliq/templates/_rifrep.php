 <?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
 <?php
  echo Catalogo($fcrepfis,1,array(
  'getprincipal' => 'getRifrep',
  'getsecundario' => 'getNomconrep',
  //cajitas abajo
  'campoprincipal' => 'rifrep',
  'camposecundario' => 'nomconrep',
  'tamanoprincipal' => '10',
  'campobase' => 'id'
  ), 'Facpicsollic_Rifrep', 'Fcconrep', '','',''); ?>