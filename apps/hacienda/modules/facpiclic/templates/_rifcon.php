 <?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
 <?php
 $id="+'&numero='+$('fcsollic_numsol').value+'&fecha='+$('fcsollic_fecsol').value";

  echo Catalogo($fcsollic,1,array(
  'getprincipal' => 'getRifcon',
  'getsecundario' => 'getNomcon',
  // cajitasss
  'campoprincipal' => 'rifcon',
  'camposecundario' => 'nomcon',
  'campobase' => 'id',
  ), 'Facpicsollic_Rifcon', 'Fcconrep', '', $id,'',1); ?>





