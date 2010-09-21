<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php
if ($fcdeclar->getId()=='')
{?>
  <?php $value = object_input_tag($fcdeclar, 'getNumdec', array (
  'size' => 8,
  'control_name' => 'fcdeclar[numdec]',
  'maxlength' => 8,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(8, '#',0);document.getElementById('fcdeclar_numdec').value=valor;document.getElementById('fcdeclar_numdec').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>
<?php
}
else
{
?>
  <?php $value = object_input_tag($fcdeclar, 'getNumdec', array (
  'size' => 8,
  'readonly' => 'readonly',
  'control_name' => 'fcdeclar[numdec]',
  'maxlength' => 12,
)); echo $value ? $value : '&nbsp;' ?>
<?php
}
?>