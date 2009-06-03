<?
$longpar = 40;
$mascaradivgeo='##-##-##';
?>

EST-CIU-MUN-PAR-SEC-
<br>
  <?php $value = object_input_tag($catdivgeo, 'getCoddivgeo', array (
  'size' => 20,
  'maxlength' => $longpar,
  'control_name' => 'catdivgeo[coddivgeo]',
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$mascaradivgeo');"

)); echo $value ? $value : '&nbsp;' ?>
