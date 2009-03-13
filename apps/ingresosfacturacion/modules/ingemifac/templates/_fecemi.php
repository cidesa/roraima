  <?php $value = object_input_date_tag($infactura, 'getFecemi', array (
  'readonly'  =>  $infactura->getId()!='' ? true : false ,
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'infactura[fecemi]',
)); echo $value ? $value : '&nbsp;' ?>