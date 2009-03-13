  <?php
  if ($ciajuste->getId()!=''){
  $value = object_input_date_tag($ciajuste, 'getFecaju', array (
  'readonly' => true,
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'ciajuste[fecaju]',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;';

  }else
  {

  $value = object_input_date_tag($ciajuste, 'getFecaju', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'ciajuste[fecaju]',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ;}?>