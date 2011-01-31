  <?php $value = object_input_tag($inprofes, 'getCedprof', array (
  'readonly'  =>  $inprofes->getId()!='' ? true : false ,
  'size' => 10,
  'control_name' => 'inprofes[cedprof]',
)); echo $value ? $value : '&nbsp;' ?>