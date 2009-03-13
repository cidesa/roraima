<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

  <?php $value = object_input_tag($ocreglic, 'getCodlic', array (
  'size' => 20,
  'control_name' => 'ocreglic[codlic]',
  'readonly'  =>  $ocreglic->getId()!='' ? true : false ,
  'maxlength' => 32,
)); echo $value ? $value : '&nbsp;' ?>