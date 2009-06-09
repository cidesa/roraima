<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php
if ($fcsollic->getId()=='')
{?>
  <?php $value = object_input_tag($fcsollic, 'getNumsol', array (
  'size' => 14,
  'control_name' => 'fcsollic[numsol]',
  'maxlength' => 12,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(12, '#',0);document.getElementById('fcsollic_numsol').value=valor;document.getElementById('fcsollic_numsol').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Máximo 12 caracteres') ?></div>
<?php
}
else
{
?>
  <?php $value = object_input_tag($fcsollic, 'getNumsol', array (
  'size' => 14,
  'readonly' => 'readonly',
  'control_name' => 'fcsollic[numsol]',
  'maxlength' => 12,
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Máximo 12 caracteres') ?></div>
<?php
}
?>