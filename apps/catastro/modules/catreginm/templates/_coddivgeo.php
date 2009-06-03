<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?
$longpar = 14;
$mascaradivgeo='##-##-##-##-##';
?>

EST-MUN-CIU-PAR-SEC
<br>
<?php
  echo Catalogo($catreginm,0,array(
  'getprincipal' => 'getCoddivgeo',
  'getsecundario' => 'getDesdivgeo',
  'campoprincipal' => 'coddivgeo',
  'camposecundario' => 'desdivgeo',
  'tamanoprincipal' => '15',
  'campobase' => 'id',
  ), 'Catdefdivbarurb_Catdivgeo', 'catdivgeo');


?>
