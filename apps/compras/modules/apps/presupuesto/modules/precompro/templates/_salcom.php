  <?php $value = object_input_tag($cpcompro, array('getSalcom',true), array (
  'size' => 7,
  'onKeyPress' => 'return validaDecimal(event)',
  'onBlur' => 'event.keyCode=13;return formatoDecimal(event,this.id)',
  'control_name' => 'cpcompro[salcom]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>