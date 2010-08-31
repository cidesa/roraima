<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
  <?php $value = object_input_tag($fafacturpro, 'getTotrec', array (
  'readOnly' => true,
  'control_name' => 'fafacturpro[totrec]',
)); echo $value ? $value : '&nbsp;' ?>

&nbsp;&nbsp;&nbsp;

<?php echo link_to_function(image_tag('/images/salir.gif'), "ocultar('divgrid_fargoartpro','divtotrec')") ?>