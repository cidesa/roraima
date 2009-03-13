<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php
if ($infactura->getId()=='')
{
 echo Catalogo($infactura,1,array(
  'getprincipal' => 'getCedprof',
  'getsecundario' => 'getNomprof',
  'campoprincipal' => 'cedprof',
  'camposecundario' => 'nomprof',
  'campobase' => 'inprofes_id'
  ), 'Ingemifac_inprofes', 'Inprofes');
}
else
{
 echo object_input_hidden_tag($infactura, 'getInprofesId',array('control_name' => 'infactura[inprofes_id]')) ?>
  <?php $value = object_input_tag($infactura, 'getCedprof', array (
  'size' => 10,
  'maxlength' => 16,
  'readonly'  =>   true,
  'control_name' => 'infactura[cedprof]',
  )); echo $value ? $value : '&nbsp;' ?>
&nbsp;
  <?php $value = object_input_tag($infactura, 'getNomprof', array (
  'readonly' => true,
   'size' => 40,
  'control_name' => 'infactura[nomprof]',
)); echo $value ? $value : '&nbsp;';
}
?>
