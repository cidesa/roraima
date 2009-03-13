<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php
if ($infactura->getId()=='')
{
 echo Catalogo($infactura,2,array(
  'getprincipal' => 'getRifemp',
  'getsecundario' => 'getRazsoc',
  'campoprincipal' => 'rifemp',
  'camposecundario' => 'razsoc',
  'campobase' => 'inempresa_id'
  ), 'Ingemifac_inempresa', 'Inempresa');

  }else
{
 echo object_input_hidden_tag($infactura, 'getInempresaId',array('control_name' => 'infactura[inempresa_id]')) ?>
  <?php $value = object_input_tag($infactura, 'getRifemp', array (
  'size' => 10,
  'maxlength' => 16,
  'readonly'  =>   true,
  'control_name' => 'infactura[rifemp]',
  )); echo $value ? $value : '&nbsp;' ?>
&nbsp;
  <?php $value = object_input_tag($infactura, 'getRazsoc', array (
  'readonly' => true,
   'size' => 40,
  'control_name' => 'infactura[razsoc]',
)); echo $value ? $value : '&nbsp;';
}
?>