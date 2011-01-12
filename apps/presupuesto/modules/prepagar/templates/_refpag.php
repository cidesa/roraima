<?php $value = object_input_tag($cppagos, 'getRefpag', array (
  'size' => 20,
  'control_name' => 'cppagos[refpag]',
  'onblur' => 'rellenar()',
  'maxlength' => 8,
  'readonly'  =>  $cppagos->getId()!='' ? true : false ,
)); echo $value ? $value : '&nbsp;' ?>