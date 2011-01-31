<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid', 'Catalogo') ?>

<?
//echo H::printR($npnomina);
?>
  <?php $value = object_input_date_tag($npnomina, 'getProfec', array (
  'rich' => true,
  'maxlength' => 10,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'npnomina[profec]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)"
)); echo $value ? $value : '&nbsp;' ?>
