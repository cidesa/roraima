<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
  <?php $value = object_checkbox_tag($empresa, 'getSalban', array (
  'control_name' => 'empresa[salban]',
)); echo $value ? $value : '&nbsp;' ?>