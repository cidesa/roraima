<?php
/*
 * Created on 29/01/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
  <?php $value = object_input_tag($usuarios, 'getRepassword', array (
  'control_name' => 'usuarios[repassword]',
  'type' => 'password',
  'size' => 15,
)); echo $value ? $value : '&nbsp;' ?>