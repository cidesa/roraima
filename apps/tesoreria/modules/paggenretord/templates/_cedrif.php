<?php
/*
 * Created on 26/05/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php	$value = object_input_tag($opordpag, 'getCedrif' , array (
  'size' => 20,
  'control_name' => 'opordpag[cedrif]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;';

   echo '&nbsp;';

  $value = object_input_tag($opordpag, 'getNomben', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'opordpag[nomben]',
)); echo $value ? $value : '&nbsp;';
?>