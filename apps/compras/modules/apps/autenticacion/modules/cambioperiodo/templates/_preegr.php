<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<br>
  <?php $value = object_checkbox_tag($empresa, 'getPreegr', array (
  'control_name' => 'empresa[preegr]',
)); echo $value ? $value : '&nbsp;' ?>