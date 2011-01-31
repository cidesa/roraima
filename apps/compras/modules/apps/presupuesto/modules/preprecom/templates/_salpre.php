  <?php $value = object_input_tag($cpprecom, array('getSalpre',true), array (
  'size' => 7,
  'onKeyPress' => 'return validaDecimal(event)',
  'onBlur' => 'event.keyCode=13;return formatoDecimal(event,this.id)',
  'control_name' => 'cpprecom[salpre]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>