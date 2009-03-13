<?php $value = object_input_tag($liressol, 'getCoduniste', array (
  'disabled' => true,
  'control_name' => 'liressol[coduniste]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
  <?php $value = object_input_tag($liressol, 'getDesuniste', array (
  'disabled' => true,
  'control_name' => 'liressol[desuniste]',
  'size' => 44,
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>

