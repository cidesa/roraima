  <?php $value = object_input_date_tag($cidefniv, 'getFecper', array (
  'rich' => true,
  'readonly' => $cidefniv->getId()!='' ? true : false ,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'cidefniv[fecper]',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onChange' => "javascript: validarfeccie()",
)); echo $value ? $value : '&nbsp;' ?>