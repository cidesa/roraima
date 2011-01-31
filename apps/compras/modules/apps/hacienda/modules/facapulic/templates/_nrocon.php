<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php
if ($fcapulic->getId()=='')
{?>
  <?php $value = object_input_tag($fcapulic, 'getNrocon', array (
  'size' => 8,
  'control_name' => 'fcapulic[nrocon]',
  'maxlength' => 8,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(8, '#',0);document.getElementById('fcapulic_nrocon').value=valor;document.getElementById('fcapulic_nrocon').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>
<?php
}
else
{
?>
  <?php $value = object_input_tag($fcapulic, 'getNrocon', array (
  'size' => 8,
  'readonly' => 'readonly',
  'control_name' => 'fcapulic[nrocon]',
  'maxlength' => 12,
)); echo $value ? $value : '&nbsp;' ?>
<?php
}
?>