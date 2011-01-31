<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

  <?php $value = object_input_tag($lireglic, 'getCodlic', array (
  'size' => 20,
  'control_name' => 'lireglic[codlic]',
  'readonly'  =>  $lireglic->getId()!='' ? true : false ,
  'maxlength' => 32,
)); echo $value ? $value : '&nbsp;' ?>