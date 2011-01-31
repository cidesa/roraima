  <?php
  if ($ciadidis->getId()!=''){
  $value = object_input_date_tag($ciadidis, 'getFecadi', array (
  'readonly' => true,
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'ciadidis[fecadi]',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;';

  }else
  {

  $value = object_input_date_tag($ciadidis, 'getFecadi', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'ciadidis[fecadi]',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ;}?>