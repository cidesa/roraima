

<?php

//	use_helper('DateForm');

  $value = object_input_date_tag($fcdeclar, 'getFecesp', array (
  'rich' => true,
  'size' => 10,
  'maxlength' => 10,
  'date_format' => 'dd/MM/yyyy',
  'disabled'  =>  $fcdeclar->getId()!='' ? true : false ,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'fcdeclar[fecesp]',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
),date('Y-m-d')); echo $value ? $value : '&nbsp;';


//echo select_time_tag('cutover_time', 'now');
?>
