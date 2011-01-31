<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php
if ($infactura->getId()=='')
{
 echo Catalogo($infactura,3,array(
  'getprincipal' => 'getCodmul',
  'getsecundario' => 'getDesmul',
  'campoprincipal' => 'codmul',
  'camposecundario' => 'desmul',
  'campobase' => 'inmulta_id'
  ), 'Ingemifac_inmulta', 'Inmulta');
  }
  else
{
 echo object_input_hidden_tag($infactura, 'getInmultaId',array('control_name' => 'infactura[inmulta_id]')) ?>
  <?php $value = object_input_tag($infactura, 'getCodmul', array (
  'size' => 10,
  'maxlength' => 16,
  'readonly'  =>   true,
  'control_name' => 'infactura[codmul]',
  )); echo $value ? $value : '&nbsp;' ?>
&nbsp;
  <?php $value = object_input_tag($infactura, 'getDesmul', array (
  'readonly' => true,
   'size' => 40,
  'control_name' => 'infactura[desmul]',
)); echo $value ? $value : '&nbsp;';
}
?>