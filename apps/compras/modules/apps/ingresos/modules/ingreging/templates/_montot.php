  <?php $value = object_input_tag($cireging, array('getMontot',true), array (
  'readonly'  =>  $cireging->getId()!='' ? true : false ,
  'size' => 20,
  'onKeyPress' => 'return validaDecimal(event)',
  'onBlur' => 'event.keyCode=13;return formatoDecimal(event,this.id)',
  'control_name' => 'cireging[montot]',
)); echo $value ? $value : '&nbsp;' ?>