 <?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
 <?php
 $id="+'&numero='+$('fcsollic_numsol').value+'&fecha='+$('fcsollic_fecsol').value";

 echo Catalogo($fcsollic,2,array(
  'getprincipal' => 'getRifrep',
  'getsecundario' => 'getNomconrep',
  //cajitas abajo
  'campoprincipal' => 'rifrep',
  'camposecundario' => 'nomconrep',
  'campobase' => 'id',
  ), 'Facpicsollic_Rifrep', 'fcconrep', '', $id); ?>