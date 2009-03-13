<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

if ($inprofes->getId()=='')
{

 echo Catalogo($inprofes,0,array(
  'getprincipal' => 'getCodespeci',
  'getsecundario' => 'getDesespeci',
  'campoprincipal' => 'codespeci',
  'camposecundario' => 'desespeci',
  'campobase' => 'inespeci_id'
  ), 'Ingregprof_inespeci', 'Inespeci');

  }else
{
 echo object_input_hidden_tag($inprofes, 'getInespeciId',array('control_name' => 'inprofes[inespeci_id]')) ?>
  <?php $value = object_input_tag($inprofes, 'getCodespeci', array (
  'size' => 10,
  'maxlength' => 16,
  'readonly'  =>   true,
  'control_name' => 'inprofes[codespeci]',
  )); echo $value ? $value : '&nbsp;' ?>
&nbsp;
  <?php $value = object_input_tag($inprofes, 'getDesespeci', array (
  'readonly' => true,
   'size' => 40,
  'control_name' => 'inprofes[desespeci]',
)); echo $value ? $value : '&nbsp;';
}
?>