  <?php $value = object_input_tag($infactura, 'getNumdep', array (
  'readonly'  =>  $infactura->getId()!='' ? true : false ,
  'size' => 50,
  'control_name' => 'infactura[numdep]',
)); echo $value ? $value : '&nbsp;' ?>