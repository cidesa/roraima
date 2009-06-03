<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?
$longpar = 40;
$mascaradivgeo='##-##-##';
?>





EST-CIU-MUN-PAR-SEC
<br>
<?php
  echo Catalogo($catreginm,0,array(
  'getprincipal' => 'getCoddivgeo',
  'getsecundario' => 'getDesdivgeo',
  'campoprincipal' => 'coddivgeo',
  'camposecundario' => 'desdivgeo',
  'campobase' => 'id',
  ), 'Catdefdivbarurb_Catdivgeo', 'catdivgeo');


?>
