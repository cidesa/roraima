  <?php
  if ($citrasla->getId()!=''){
  $value = object_input_date_tag($citrasla, 'getFectra', array (
  'readonly' => true,
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'citrasla[fectra]',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;';

  }else
  {

  $value = object_input_date_tag($citrasla, 'getFectra', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'citrasla[fectra]',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ;}?>