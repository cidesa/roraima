<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?  echo $params[2]; ?>
<br>
  <?php
  $mascara    = $params[0];
  $longdivgeo = $params[1];

  $value = object_input_tag($catdivgeo, 'getCoddivgeo', array (
  'size' => $longdivgeo,
  'maxlength' => $longdivgeo,
  'control_name' => 'catdivgeo[coddivgeo]',
  'onKeyDown'    => "javascript:return dFilter (event.keyCode, this,'$mascara')",

)); echo $value ? $value : '&nbsp;' ?>