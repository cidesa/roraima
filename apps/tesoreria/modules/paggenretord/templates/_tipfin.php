<?php
/*
 * Created on 26/05/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php	$value = object_input_tag($opordpag, 'getTipfin' , array (
  'size' => 20,
  'control_name' => 'opordpag[tipfin]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;';

   echo '&nbsp;';

  $value = object_input_tag($opordpag, 'getNomext2', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'opordpag[nomext2]',
)); echo $value ? $value : '&nbsp;';
?>