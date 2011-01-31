<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php
if ($liemppar->getId()=='')
{
echo Catalogo($liemppar,1,array(
  'getprincipal' => 'getCodlic',
  'getsecundario' => 'getDeslic',
  'campoprincipal' => 'codlic',
  'camposecundario' => 'deslic',
  'campobase' => 'lireglic_id',
  ), 'Liemppar_licreglic', 'Lireglic', '', '');
}
else
{
 echo object_input_hidden_tag($liemppar, 'getLireglicId',array('control_name' => 'liemppar[lireglic_id]')) ?>
  <?php $value = object_input_tag($liemppar, 'getCodlic', array (
  'size' => 20,
  'maxlength' => 16,
  'readonly'  =>   true,
  'control_name' => 'liemppar[codlic]',
  )); echo $value ? $value : '&nbsp;' ?>
&nbsp;
  <?php $value = object_input_tag($liemppar, 'getDeslic', array (
  'readonly' => true,
   'size' => 40,
  'control_name' => 'liemppar[deslic]',
)); echo $value ? $value : '&nbsp;';
}
?>

