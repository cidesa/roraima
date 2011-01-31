<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php
if ($fcesplic->getId()=='')
{?>
  <?php $value = object_input_tag($fcesplic, 'getNrocon', array (
  'size' => 8,
  'control_name' => 'fcesplic[nrocon]',
  'maxlength' => 8,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(8, '#',0);document.getElementById('fcesplic_nrocon').value=valor;document.getElementById('fcesplic_nrocon').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>
<?php
}
else
{
?>
  <?php $value = object_input_tag($fcesplic, 'getNrocon', array (
  'size' => 8,
  'readonly' => 'readonly',
  'control_name' => 'fcesplic[nrocon]',
  'maxlength' => 12,
)); echo $value ? $value : '&nbsp;' ?>
<?php
}
?>