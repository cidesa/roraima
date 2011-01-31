  <?php $value = object_input_tag($infactura, array('getMoncan',true), array (
  'readonly'  =>  $infactura->getId()!='' ? true : false ,
  'size' => 15,
  'onKeyPress' => 'return validaDecimal(event)',
  'onBlur' => 'event.keyCode=13;return formatoDecimal(event,this.id)',
  'control_name' => 'infactura[moncan]',
)); echo $value ? $value : '&nbsp;' ?>