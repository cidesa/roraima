<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
  <?php
  $var=$fcusoveh->getFormatopre();
  $lon=strlen(trim($fcusoveh->getFormatopre()));
  $value = object_input_tag($fcusoveh, 'getCoduso', array (
  'size' => $lon+2,
  'maxlength' => $lon,
  'control_name' => 'fcusoveh[coduso]',
  //'onBlur' => 'codigopadre()',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$var')",
)); echo $value ? $value : '&nbsp;' ?>



