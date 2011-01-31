  <?php $value = object_input_tag($citrasla, array('getTottra',true), array (
  'size' => 15,
  'readonly'  =>  $citrasla->getId()!='' ? true : false ,
  'onKeyPress' => 'return validaDecimal(event)',
  'onBlur' => 'event.keyCode=13;return formatoDecimal(event,this.id)',
  'control_name' => 'citrasla[tottra]',
)); echo $value ? $value : '&nbsp;' ?>