<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?
$longpar = 19;
$mascaradivgeo='##-##-##-##-##-####';
?>

EST-MUN-CIU-PAR-SEC-XXXX
<br>
<?php
  echo Catalogo($catreginm,0,array(
  'getprincipal' => 'getCoddivgeo',
  'getsecundario' => 'getDesdivgeo',
  'campoprincipal' => 'coddivgeo',
  'camposecundario' => 'desdivgeo',
  'tamanoprincipal' => '20',
  'campobase' => 'id',
  ), 'Catdefdivbarurb_Catdivgeo', 'catdivgeo');


?>
