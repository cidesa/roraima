<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php
  echo Catalogo($viaregsolvia,1,array(
  'getprincipal' => 'getCedemp',
  'getsecundario' => 'getNomemp',
  'campoprincipal' => 'cedemp',
  'camposecundario' => 'nomemp',
  'campobase' => 'id',
  ), 'Viaregsolvia_Nphojint', 'nphojint','','','',1);


?>
