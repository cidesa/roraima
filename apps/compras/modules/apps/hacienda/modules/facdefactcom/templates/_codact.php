<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
  <?php
  $var=$fcactcom->getMascara();
  $lon=strlen(trim($fcactcom->getMascara()));
  $value = object_input_tag($fcactcom, 'getCodact', array (
  'size' => $lon+2,
  'maxlength' => $lon,
  'control_name' => 'fcactcom[codact]',
  //'onBlur' => 'codigopadre()',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$var')",
)); echo $value ? $value : '&nbsp;' ?>