<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php
if ($liasplegcrieva->getId()=='')
{
echo Catalogo($liasplegcrieva,1,array(
  'getprincipal' => 'getCodlic',
  'getsecundario' => 'getDeslic',
  'campoprincipal' => 'codlic',
  'camposecundario' => 'deslic',
  'campobase' => 'lireglic_id',
  ), 'Liemppar_licreglic', 'Lireglic', '', '');
}
else
{
 echo object_input_hidden_tag($liasplegcrieva, 'getLireglicId',array('control_name' => 'liasplegcrieva[lireglic_id]')) ?>
  <?php $value = object_input_tag($liasplegcrieva, 'getCodlic', array (
  'size' => 20,
  'maxlength' => 16,
  'readonly'  =>   true,
  'control_name' => 'liasplegcrieva[codlic]',
  )); echo $value ? $value : '&nbsp;' ?>
&nbsp;
  <?php $value = object_input_tag($liasplegcrieva, 'getDeslic', array (
  'readonly' => true,
   'size' => 40,
  'control_name' => 'liasplegcrieva[deslic]',
)); echo $value ? $value : '&nbsp;';
}
?>

