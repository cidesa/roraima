<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php
if ($liaspfinanalis->getId()=='')
{
echo Catalogo($liaspfinanalis,1,array(
  'getprincipal' => 'getCodlic',
  'getsecundario' => 'getDeslic',
  'campoprincipal' => 'codlic',
  'camposecundario' => 'deslic',
  'campobase' => 'lireglic_id',
  ), 'Liemppar_licreglic', 'Lireglic', '', '');
}
else
{
 echo object_input_hidden_tag($liaspfinanalis, 'getLireglicId',array('control_name' => 'liaspfinanalis[lireglic_id]')) ?>
  <?php $value = object_input_tag($liaspfinanalis, 'getCodlic', array (
  'size' => 20,
  'maxlength' => 16,
  'readonly'  =>   true,
  'control_name' => 'liaspfinanalis[codlic]',
  )); echo $value ? $value : '&nbsp;' ?>
&nbsp;
  <?php $value = object_input_tag($liaspfinanalis, 'getDeslic', array (
  'readonly' => true,
   'size' => 40,
  'control_name' => 'liaspfinanalis[deslic]',
)); echo $value ? $value : '&nbsp;';
}
?>

