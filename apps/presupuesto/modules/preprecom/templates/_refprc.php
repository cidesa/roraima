  <?php $value = object_input_tag($cpprecom, 'getRefprc', array (
  'size' => 20,
  'readonly'  =>  $cpprecom->getId()!='' ? true : false ,
  'control_name' => 'cpprecom[refprc]',
  'onblur' => 'rellenar()',
  'readonly'  =>  $cpprecom->getId()!='' ? true : false ,
  'maxlength' => 8,
)); echo $value ? $value : '&nbsp;' ?>