<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php
if ($infactura->getId()=='')
{
 echo Catalogo($infactura,4,array(
  'getprincipal' => 'getCodingprof',
  'getsecundario' => 'getDesingprof',
  'campoprincipal' => 'codingprof',
  'camposecundario' => 'desingprof',
  'campobase' => 'iningprof_id'
  ), 'Ingemifac_iningprof', 'Iningprof');
  }
  else
{
 echo object_input_hidden_tag($infactura, 'getIningprofId',array('control_name' => 'infactura[iningprof_id]')) ?>
  <?php $value = object_input_tag($infactura, 'getCodingprof', array (
  'size' => 10,
  'maxlength' => 16,
  'readonly'  =>   true,
  'control_name' => 'infactura[codingprof]',
  )); echo $value ? $value : '&nbsp;' ?>
&nbsp;
  <?php $value = object_input_tag($infactura, 'getDesingprof', array (
  'readonly' => true,
   'size' => 40,
  'control_name' => 'infactura[desingprof]',
)); echo $value ? $value : '&nbsp;';
}
?>