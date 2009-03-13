<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
  <?php
  $value = object_input_tag($fcvalinm, 'getPorvalfis', array (
  'size' => 5,
  'maxlength' => 5,
  'control_name' => 'fcvalinm[porvalfis]',
  //'onkeypress' =>"javascript:return num(event)",
  'onBlur' => 'Multiplicar_uno()',
)); echo $value ? $value : '&nbsp;' ?>