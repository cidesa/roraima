<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
  <?php $value = object_checkbox_tag($empresa, 'getMovtra', array (
  'control_name' => 'empresa[movtra]',
)); echo $value ? $value : '&nbsp;' ?>