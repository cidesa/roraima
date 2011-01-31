<?php $value = object_input_tag($lirecaud, 'getCodrec', array (
  'size' => 10,
  'control_name' => 'lirecaud[codrec]',
  'maxlength' => 4,
  'readonly'  =>  $lirecaud->getId()!='' ? true : false ,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);document.getElementById('lirecaud_codrec').value=valor",
)); echo $value ? $value : '&nbsp;' ?>
