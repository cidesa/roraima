

  <?php $value = object_textarea_tag($atayudas, 'getDetayu', array (
  'size' => '100x5',
  'maxlength' => 1000,
  'readonly' => true,
  'onkeyup' => "javascript:return ismaxlength(this)",
  'control_name' => 'atayudas[detayu]',
)); echo $value ? $value : '&nbsp;' ?>
