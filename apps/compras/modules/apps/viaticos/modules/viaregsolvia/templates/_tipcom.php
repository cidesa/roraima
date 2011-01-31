<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php
//$forpre = "/param1/".str_replace('#','!',Herramientas :: ObtenerFormato('cpdefniv', 'forpre'));

  echo Catalogo($viaregsolvia,0,array(
  'getprincipal' => 'getTipcom',
  'getsecundario' => 'getNomext',
  'campoprincipal' => 'tipcom',
  'camposecundario' => 'nomext',
  'campobase' => 'id',
  ), 'Viaregsolvia_Cpdoccom', 'Cpdoccom','','','');



?>
