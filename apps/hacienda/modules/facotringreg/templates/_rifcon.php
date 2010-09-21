 <?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
 <?php
 $id="+'&numero='+$('fcotring_numsol').value+'&fecha='+$('fcotring_fecsol').value";

  echo Catalogo($fcotring,1,array(
  'getprincipal' => 'getRifcon',
  'getsecundario' => 'getNomcon',
  // cajitasss
  'campoprincipal' => 'rifcon',
  'camposecundario' => 'nomcon',
  'campobase' => 'id',
  ), 'Facotringreg_Rifcon', 'Fcconrep', '', $id); ?>






