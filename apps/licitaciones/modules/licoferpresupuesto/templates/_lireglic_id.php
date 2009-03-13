<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php
if ($lioferpre->getId()=='')
{
echo Catalogo($lioferpre,1,array(
  'getprincipal' => 'getCodlic',
  'getsecundario' => 'getDeslic',
  'campoprincipal' => 'codlic',
  'camposecundario' => 'deslic',
  'campobase' => 'lireglic_id',
  ), 'Liemppar_licreglic', 'Lireglic', '', '');
}
else
{
 echo object_input_hidden_tag($lioferpre, 'getLireglicId',array('control_name' => 'lioferpre[lireglic_id]')) ?>
  <?php $value = object_input_tag($lioferpre, 'getCodlic', array (
  'size' => 20,
  'maxlength' => 16,
  'readonly'  =>   true,
  'control_name' => 'lioferpre[codlic]',
  )); echo $value ? $value : '&nbsp;' ?>
&nbsp;
  <?php $value = object_input_tag($lioferpre, 'getDeslic', array (
  'readonly' => true,
   'size' => 40,
  'control_name' => 'lioferpre[deslic]',
)); echo $value ? $value : '&nbsp;';
}
?>

