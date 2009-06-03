<?
$longpar = 14;
$mascaradivgeo='##-##-##-##-##';
?>

EST-MUN-CIU-PAR-SEC
<br>
  <?php $value = object_input_tag($catdivgeo, 'getCoddivgeo', array (
  'size' => 14,
  'maxlength' => $longpar,
  'control_name' => 'catdivgeo[coddivgeo]',
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$mascaradivgeo');"

)); echo $value ? $value : '&nbsp;' ?>
