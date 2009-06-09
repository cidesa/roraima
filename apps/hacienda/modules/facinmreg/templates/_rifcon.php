 <?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
 <?php
   echo Catalogo($fcreginm,0,array(
  'getprincipal' => 'getRifcon',
  'getsecundario' => 'getNomcon',
  // cajitasss
  'campoprincipal' => 'rifcon',
  'camposecundario' => 'nomcon',
  'campobase' => 'id',
  ), 'Facpicsollic_Rifcon', 'Fcconrep', '','',''); ?>

