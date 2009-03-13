<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
  <?php
  $var=$cideftit->getMascara();

  $value = object_input_tag($cideftit, 'getCodpre', array (
  'size' => 32,
  'control_name' => 'cideftit[codpre]',
  //'onBlur' => 'codigopadre()',
  //'onkeyup' => "javascript: mascara(this,'-',$var,true)",
  //'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$var')",
)); echo $value ? $value : '&nbsp;' ?>
