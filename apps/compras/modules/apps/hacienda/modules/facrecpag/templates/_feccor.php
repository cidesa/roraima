  <?php $value = object_input_date_tag($fcpagos, 'getFeccor', array (
  'rich' => true,
  'onkeyup' => 'javascript: mascara(this,\'/\',patron,true)',
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'fcpagos[feccor]',
  'date_format' => 'dd/MM/yyyy',
  'size' => 10,
  'value'=> date('d/m/Y'),
)); echo $value ? $value : '&nbsp;' ?>
