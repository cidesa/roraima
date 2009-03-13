<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php
if ($cireging->getId()=='')
{
 echo Catalogo($cireging,0,array(
  'getprincipal' => 'getNumcue',
  'getsecundario' => 'getNomcue',
  'campoprincipal' => 'numcue',
  'camposecundario' => 'nomcue',
  'campobase' => 'tsdefban_id'
  ), 'Ingreging_tsdefban', 'tsdefban');

  }else
{
 echo object_input_hidden_tag($cireging, 'getCtaban',array('control_name' => 'cireging[ctaban]')) ?>
  <?php $value = object_input_tag($cireging, 'getCtaban', array (
  'size' => 20,
  'maxlength' => 25,
  'readonly'  =>   true,
  'control_name' => 'cireging[ctaban]',
  )); echo $value ? $value : '&nbsp;' ?>
&nbsp;
  <?php $value = object_input_tag($cireging, 'getNomcue', array (
  'readonly' => true,
   'size' => 40,
  'control_name' => 'cireging[nomcue]',
)); echo $value ? $value : '&nbsp;';
}
?>