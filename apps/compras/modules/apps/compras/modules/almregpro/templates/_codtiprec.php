<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php
//divrecaudos
  echo Catalogo($caprovee,8,array(
  'getprincipal' => 'getCodtiprec',
  'getsecundario' => 'getDestiprec',
  'campoprincipal' => 'codtiprec',
  'camposecundario' => 'destiprec',
  'tamanoprincipal' => '4',
  'campobase' => 'id',
  ), 'Almregpro_Catiprec', 'Catiprec','','','divrecaudos');


?>
