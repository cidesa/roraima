<?php $value = object_input_tag($liregsol, 'getNumsol', array (
  'size' => 10,
  'control_name' => 'liregsol[numsol]',
  'maxlength' => 8,
  'readonly'  =>  $liregsol->getId()!='' ? true : false ,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);document.getElementById('liregsol_numsol').value=valor",
)); echo $value ? $value : '&nbsp;' ?>
