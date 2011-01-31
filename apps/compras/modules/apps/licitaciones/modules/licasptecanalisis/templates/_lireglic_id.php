<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php
if ($liasptecanalis->getId()=='')
{
echo Catalogo($liasptecanalis,1,array(
  'getprincipal' => 'getCodlic',
  'getsecundario' => 'getDeslic',
  'campoprincipal' => 'codlic',
  'camposecundario' => 'deslic',
  'campobase' => 'lireglic_id',
  ), 'Liemppar_licreglic', 'Lireglic', '', '');
}
else
{
 echo object_input_hidden_tag($liasptecanalis, 'getLireglicId',array('control_name' => 'liasptecanalis[lireglic_id]')) ?>
  <?php $value = object_input_tag($liasptecanalis, 'getCodlic', array (
  'size' => 20,
  'maxlength' => 16,
  'readonly'  =>   true,
  'control_name' => 'liasptecanalis[codlic]',
  )); echo $value ? $value : '&nbsp;' ?>
&nbsp;
  <?php $value = object_input_tag($liasptecanalis, 'getDeslic', array (
  'readonly' => true,
   'size' => 40,
  'control_name' => 'liasptecanalis[deslic]',
)); echo $value ? $value : '&nbsp;';
}
?>

