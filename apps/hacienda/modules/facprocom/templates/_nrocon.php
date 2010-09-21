<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php
if ($fcprolic->getId()=='')
{?>
  <?php $value = object_input_tag($fcprolic, 'getNrocon', array (
  'size' => 10,
  'control_name' => 'fcprolic[nrocon]',
  'maxlength' => 10,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(10, '#',0);document.getElementById('fcprolic_nrocon').value=valor;document.getElementById('fcprolic_nrocon').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>
<?php
}
else
{
?>
  <?php $value = object_input_tag($fcprolic, 'getNrocon', array (
  'size' => 10,
  'readonly' => 'readonly',
  'control_name' => 'fcprolic[nrocon]',
  'maxlength' => 12,
)); echo $value ? $value : '&nbsp;' ?>
<?php
}
?>