<?php $value = object_input_tag($lireglic, 'getCoduniste', array (
  'disabled' => true,
  'control_name' => 'lireglic[coduniste]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
  <?php $value = object_input_tag($lireglic, 'getDesuniste', array (
  'disabled' => true,
  'control_name' => 'lireglic[desuniste]',
  'size' => 44,
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>

