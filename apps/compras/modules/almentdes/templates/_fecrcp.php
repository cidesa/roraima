<?php $value = object_input_date_tag($caentalm, 'getFecrcp', array (
'rich' => true,
'calendar_button_img' => '/sf/sf_admin/images/date.png',
'control_name' => 'caentalm[fecrcp]',
'date_format' => 'dd/MM/yyyy',
'readonly'  =>  $caentalm->getId()!='' ? true : false,
'onkeyup' => "javascript: mascara(this,'/',patron,true)",
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>