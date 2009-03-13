  <?php $value = object_input_tag($inprofes, 'getApeprof', array (
  'readonly'  =>  $inprofes->getId()!='' ? true : false ,
  'size' => 60,
  'control_name' => 'inprofes[apeprof]',
)); echo $value ? $value : '&nbsp;' ?>