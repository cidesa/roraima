<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

if ($infactura->getId()=='')
{
 echo Catalogo($infactura,0,array(
  'getprincipal' => 'getCodban',
  'getsecundario' => 'getDesban',
  'campoprincipal' => 'codban',
  'camposecundario' => 'desban',
  'campobase' => 'indefban_id'
  ), 'Ingemifac_indefban', 'Indefban');
}
else
{
 echo object_input_hidden_tag($infactura, 'getIndefbanId',array('control_name' => 'infactura[indefban_id]')) ?>
  <?php $value = object_input_tag($infactura, 'getCodban', array (
  'size' => 10,
  'maxlength' => 16,
  'readonly'  =>   true,
  'control_name' => 'infactura[codban]',
  )); echo $value ? $value : '&nbsp;' ?>
&nbsp;
  <?php $value = object_input_tag($infactura, 'getDesban', array (
  'readonly' => true,
   'size' => 40,
  'control_name' => 'infactura[desban]',
)); echo $value ? $value : '&nbsp;';
}
?>