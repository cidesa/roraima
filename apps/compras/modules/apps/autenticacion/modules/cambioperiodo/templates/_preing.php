<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
  <?php $value = object_checkbox_tag($empresa, 'getPreing', array (
  'control_name' => 'empresa[preing]',
)); echo $value ? $value : '&nbsp;' ?>