<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php
if ($fcotring->getId()=='')
{?>
  <?php $value = object_input_tag($fcotring, 'getnrocon', array (
  'size' => 10,
  'control_name' => 'fcotring[nrocon]',
  'maxlength' => 10,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(10, '#',0);document.getElementById('fcotring_nrocon').value=valor;document.getElementById('fcotring_nrocon').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Máximo 10 caracteres') ?></div>
<?php
}
else
{
?>
  <?php $value = object_input_tag($fcotring, 'getnrocon', array (
  'size' => 14,
  'readonly' => 'readonly',
  'control_name' => 'fcotring[nrocon]',
  'maxlength' => 12,
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Máximo 10 caracteres') ?></div>
<?php
}
?>