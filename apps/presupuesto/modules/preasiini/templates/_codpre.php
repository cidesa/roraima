<?php $value = object_input_tag($cpasiini, 'getCodpre', array (
  'size' => 20,
  'control_name' => 'cpasiini[codpre]',
  'readonly'  =>  $cpasiini->getId()!='' ? true : false ,
)); echo $value ? $value : '&nbsp;' ?>
