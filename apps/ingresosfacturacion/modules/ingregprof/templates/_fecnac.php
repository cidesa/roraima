
  <?php

  $value = object_input_date_tag($inprofes, 'getFecnac', array (
  'rich' => true,
  'readonly'  =>  $inprofes->getId()!='' ? true : false ,
  'calendar_button'=> false,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'inprofes[fecnac]',
  )); echo $value ? $value : '&nbsp;'

?>
