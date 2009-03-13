  <?php $value = object_input_tag($inprofes, 'getNacprof', array (
  'readonly'  =>  $inprofes->getId()!='' ? true : false ,
  'size' => 50,
  'control_name' => 'inprofes[nacprof]',
)); echo $value ? $value : '&nbsp;' ?>