<?php $value = object_input_tag($liressol, 'getNumcor', array (
  'size' => 10,
  'control_name' => 'liressol[numcor]',
  'maxlength' => 4,
  'readonly'  =>  $liressol->getId()!='' ? true : false ,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);document.getElementById('liressol_numcor').value=valor",
)); echo $value ? $value : '&nbsp;' ?>
