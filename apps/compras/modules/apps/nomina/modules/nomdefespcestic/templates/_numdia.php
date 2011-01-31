
  <?php $value = object_input_tag($npcestatickets, 'getNumdia', array (
  'size' => 7,
  'onKeyPress' => 'return validaDecimal(event)',
  'onBlur' => 'event.keyCode=13;return formatoDecimal(event,this.id)',
  'control_name' => 'npcestatickets[numdia]',
)); echo $value ? $value : '&nbsp;' ?>


