  <?php $value = object_input_tag($cireging, 'getNumofi', array (
  'readonly'  =>  $cireging->getId()!='' ? true : false ,
  'size' => 50,
  'control_name' => 'cireging[numofi]',
)); echo $value ? $value : '&nbsp;' ?>