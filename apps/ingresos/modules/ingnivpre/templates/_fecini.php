  <?php $value = object_input_date_tag($cidefniv, 'getFecini', array (
  'rich' => true,
  'readonly' => $cidefniv->getId()!='' ? true : false ,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'cidefniv[fecini]',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onChange' => "javascript: validarfecini()",
)); echo $value ? $value : '&nbsp;' ?>