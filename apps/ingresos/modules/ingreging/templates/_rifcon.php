<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php
if ($cireging->getId()=='')
{
 echo Catalogo($cireging,0,array(
  'getprincipal' => 'getRifcon',
  'getsecundario' => 'getNomcon',
  'campoprincipal' => 'rifcon',
  'camposecundario' => 'nomcon',
  'campobase' => 'ciconrep_id'
  ), 'Ingreging_ciconrep', 'ciconrep');

  }else
{
 echo object_input_hidden_tag($cireging, 'getRifcon',array('control_name' => 'cireging[rifcon]')) ?>
  <?php $value = object_input_tag($cireging, 'getRifcon', array (
  'size' => 10,
  'maxlength' => 16,
  'readonly'  =>   true,
  'control_name' => 'cireging[rifcon]',
  )); echo $value ? $value : '&nbsp;' ?>
&nbsp;
  <?php $value = object_input_tag($cireging, 'getNomcon', array (
  'readonly' => true,
   'size' => 40,
  'control_name' => 'cireging[nomcon]',
)); echo $value ? $value : '&nbsp;';
}
?>