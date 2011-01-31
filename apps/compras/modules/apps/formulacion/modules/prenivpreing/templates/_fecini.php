  <?php
  $hay=Formulacion::movimientos();
  $value = object_input_date_tag($foringdefniv, 'getFecini', array (
  'rich' => true,
  'readonly' => $hay == 1 ? true : false ,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'foringdefniv[fecini]',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",  
)); echo $value ? $value : '&nbsp;' ?>