<?php $value = object_input_tag($cpasiini, 'getMonasi', array (
  'size' => 10,
  'control_name' => 'cpasiini[monasi]',
  'onkeypress' => 'javascript:generarMonasig(); return validaDecimal(event);',
  'onblur' => 'event.keyCode=13; return formatoDecimal(event,this.id);',
)); echo $value ? $value : '&nbsp;' ?>