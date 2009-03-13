<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php
if ($cireging->getId()=='')
{
 echo Catalogo($cireging,0,array(
  'getprincipal' => 'getCodtip',
  'getsecundario' => 'getDestip',
  'campoprincipal' => 'codtip',
  'camposecundario' => 'destip',
  'campobase' => 'citiping_id'
  ), 'Ingreging_citiping', 'citiping');

}else
{
 echo object_input_hidden_tag($cireging, 'getCodtip',array('control_name' => 'cireging[codtip]')) ?>
  <?php $value = object_input_tag($cireging, 'getCodtip', array (
  'size' => 10,
  'maxlength' => 16,
  'readonly'  =>   true,
  'control_name' => 'cireging[codtip]',
  )); echo $value ? $value : '&nbsp;' ?>
&nbsp;
  <?php $value = object_input_tag($cireging, 'getDestip', array (
  'readonly' => true,
   'size' => 40,
  'control_name' => 'cireging[destip]',
)); echo $value ? $value : '&nbsp;';
}
?>