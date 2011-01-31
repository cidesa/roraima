  <?php $value = object_input_tag($inprofes, 'getNomprof', array (
  'readonly'  =>  $inprofes->getId()!='' ? true : false ,
  'size' => 60,
  'control_name' => 'inprofes[nomprof]',
)); echo $value ? $value : '&nbsp;' ?>