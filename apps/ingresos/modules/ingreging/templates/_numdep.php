  <?php $value = object_input_tag($cireging, 'getNumdep', array (
  <?php $value = object_input_tag($cireging, 'getNumdep', array (
  'readonly'  =>  $cireging->getId()!='' ? true : false ,
  'size' => 50,
  'control_name' => 'cireging[numdep]',
)); echo $value ? $value : '&nbsp;' ?>  'readonly'  =>  $cireging->getId()!='' ? true : false ,
  'size' => 50,
  'control_name' => 'cireging[numdep]',
)); echo $value ? $value : '&nbsp;' ?>