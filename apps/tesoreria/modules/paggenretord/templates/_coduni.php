<?php
/*
 * Created on 26/05/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php	$value = object_input_tag($opordpag, 'getCoduni' , array (
  'size' => 20,
  'control_name' => 'opordpag[coduni]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;';

   echo '&nbsp;';

  $value = object_input_tag($opordpag, 'getDesubi', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'opordpag[desubi]',
)); echo $value ? $value : '&nbsp;';
?>