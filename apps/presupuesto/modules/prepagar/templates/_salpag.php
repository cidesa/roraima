<?php $value = object_input_tag($cppagos, array('getSalpag',true), array (
  'size' => 10,
  'onKeyPress' => 'return validaDecimal(event)',
  'onBlur' => 'event.keyCode=13;return formatoDecimal(event,this.id)',
  'control_name' => 'cppagos[salpag]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>
