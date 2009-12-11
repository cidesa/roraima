<?php
/*
 * Created on 10/11/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<strong><font size="2" face="MS sans-serif"><?php echo __('SIMA') ?></font></strong>
  <?php $value = object_input_tag($empresa, 'getCodempdes', array (
  'disabled' => false,
  'control_name' => 'empresa[codempdes]',
  'maxlength' => 3,
  'size' => 5,
)); echo $value ? $value : '&nbsp;' ?>