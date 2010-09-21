 <?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
 <?php
 $id="+'&numero='+$('fcregveh_numsol').value+'&fecha='+$('fcregveh_fecsol').value";

 echo Catalogo($fcregveh,2,array(
  'getprincipal' => 'getRifrep',
  'getsecundario' => 'getNomconrep',
  //cajitas abajo
  'campoprincipal' => 'rifrep',
  'camposecundario' => 'nomconrep',
  'campobase' => 'id',
  ), 'Facpicsollic_Rifrep', 'fcconrep', '', $id); ?>