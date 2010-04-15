<?php
/*
 * Created on 26/05/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php	$value = object_input_tag($opordpag, 'getCtapag' , array (
  'size' => 20,
  'control_name' => 'opordpag[ctapag]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;';

   echo '&nbsp;';

  $value = object_input_tag($opordpag, 'getDescta', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'opordpag[descta]',
)); echo $value ? $value : '&nbsp;';
?>