 <?php $value = object_input_tag($cpasiini, array('getMonasi',true), array (
  'size' => 12,
  'onKeyPress' => 'return validaDecimal(event)',
  'onBlur' => 'event.keyCode=13;return distribuyePer(event,this.id)',
  'control_name' => 'cpasiini[monasi]',
)); echo $value ? $value : '&nbsp;' ?>

