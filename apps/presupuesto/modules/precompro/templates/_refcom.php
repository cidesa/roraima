<?php $value = object_input_tag($cpcompro, 'getRefcom', array (
  'size' => 20,
  'control_name' => 'cpcompro[refcom]',
  'onblur' => 'rellenar()',
  'maxlength' => 8,
  'readonly'  =>  $cpcompro->getId()!='' ? true : false ,
)); echo $value ? $value : '&nbsp;' ?>