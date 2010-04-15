<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?  echo $params[2]; ?>
<br>
  <?php
  $mascara    = $params[0];
  $long = $params[1];

  $value = object_input_tag($cpdeftit, 'getCodpre', array (
  'size' => $long,
  'maxlength' => $long,
  'control_name' => 'cpdeftit[codpre]',
  'onKeyDown'    => "javascript:return dFilter (event.keyCode, this,'$mascara')",

)); echo $value ? $value : '&nbsp;' ?>