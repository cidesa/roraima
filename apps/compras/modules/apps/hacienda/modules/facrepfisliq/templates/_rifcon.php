 <?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
 <?php
   echo Catalogo($fcrepfis,3,array(
  'getprincipal' => 'getRifcon',
  'getsecundario' => 'getNomcon',
  // cajitasss
  'campoprincipal' => 'rifcon',
  'camposecundario' => 'nomcon',
  'tamanoprincipal' => '10',
  'campobase' => 'id',
  ), 'Facpicsollic_Rifcon', 'Fcconrep', '','',''); ?>

