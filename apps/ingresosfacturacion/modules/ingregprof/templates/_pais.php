  <?php $value = object_input_tag($inprofes, 'getPais', array (
  'size' => 50,
  'readonly'  =>  $inprofes->getId()!='' ? true : false ,
  'control_name' => 'inprofes[pais]',
)); echo $value ? $value : '&nbsp;' ?>