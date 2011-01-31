<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

  echo Catalogo($caprovee,0,array(
  'getprincipal' => 'getCodtip',
  'getsecundario' => 'getDestipcta',
  'campoprincipal' => 'codtip',
  'camposecundario' => 'destipcta',
  'tamanoprincipal' => '3',
  'campobase' => 'id',
  ), 'Almregpro_Tstipcue', 'tstipcue','','','');


?>
