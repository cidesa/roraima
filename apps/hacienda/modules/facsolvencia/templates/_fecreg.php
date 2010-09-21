<?php

  $value = object_input_date_tag($fcsolvencia, 'getFecreg', array (
  'readonly' => true,
  'rich' => true,
  'size' => 10,
  'maxlength' => 10,
  'date_format' => 'dd/MM/yyyy',

  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'fcsolvencia[fecreg]',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
),date('Y-m-d')); echo $value ? $value : '&nbsp;';

?>
