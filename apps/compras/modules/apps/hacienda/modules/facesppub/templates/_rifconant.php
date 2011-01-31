 <?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
 <?php
   echo Catalogo($fcesplic,0,array(
  'getprincipal' => 'getRifcon',
  'getsecundario' => 'getNomconant',
  // cajitasss
  'campoprincipal' => 'rifconant',
  'camposecundario' => 'nomconant',
  'tamanoprincipal' => '10',
  'campobase' => 'id',
  ), 'Facpicsollic_Rifcon', 'Fcconrep', '','',''); ?>

