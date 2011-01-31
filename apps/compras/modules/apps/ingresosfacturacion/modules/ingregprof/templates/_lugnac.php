  <?php $value = object_input_tag($inprofes, 'getLugnac', array (
  'readonly'  =>  $inprofes->getId()!='' ? true : false ,
  'size' => 80,
  'control_name' => 'inprofes[lugnac]',
)); echo $value ? $value : '&nbsp;' ?>