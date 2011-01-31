<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
  <?php
  $var=$fccatfis->getMascara();
  $lon=strlen(trim($fccatfis->getMascara()));
  $value = object_input_tag($fccatfis, 'getCodcatfis', array (
  'size' => $lon+2,
  'maxlength' => $lon,
  'control_name' => 'fccatfis[codcatfis]',
  //'onBlur' => 'codigopadre()',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$var')",
)); echo $value ? $value : '&nbsp;' ?>