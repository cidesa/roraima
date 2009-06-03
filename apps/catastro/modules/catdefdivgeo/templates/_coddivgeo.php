<?
$longpar = 19;
$mascaradivgeo='##-##-##-##-##-####';
?>

EST-MUN-CIU-PAR-SEC-XXXX
<br>
  <?php $value = object_input_tag($catdivgeo, 'getCoddivgeo', array (
  'size' => 20,
  'maxlength' => $longpar,
  'control_name' => 'catdivgeo[coddivgeo]',
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$mascaradivgeo');"

)); echo $value ? $value : '&nbsp;' ?>
