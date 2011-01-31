  <?php $value = object_input_tag($inprofes, 'getDirnac', array (
  'readonly'  =>  $inprofes->getId()!='' ? true : false ,
  'size' => 50,
  'control_name' => 'inprofes[dirnac]',
)); echo $value ? $value : '&nbsp;' ?>