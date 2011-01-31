  <?php
  $hay=Ingresos::movimientos();
  $value = object_input_date_tag($cidefniv, 'getFecini', array (
  'rich' => true,
  'readonly' => $hay == 1 ? true : false ,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'cidefniv[fecini]',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onChange' => "javascript: validarfecini()",
)); echo $value ? $value : '&nbsp;' ?>