<?php
/*
 * Created on 27/10/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php	$value = object_input_tag($ocemppar, 'getCodpre' , array (
  'size' => 30,
  'control_name' => 'ocemppar[codpre]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;';

   echo '&nbsp;';

  $value = object_input_tag($ocemppar, 'getNompre', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'ocemppar[nompre]',
)); echo $value ? $value : '&nbsp;';


?>