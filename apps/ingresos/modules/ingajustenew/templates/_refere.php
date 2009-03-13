<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php
if($ciajuste->getId()==''){
 echo Catalogo($ciajuste,1,array(
  'getprincipal' => 'getRefing',
  'getsecundario' => 'getDesing',
  'campoprincipal' => 'refing',
  'camposecundario' => 'desing',
  'campobase' => 'cireging_id'
  ), 'Ingajustenew_cireging', 'cireging','','','divgrid');

}else
{
 echo object_input_hidden_tag($ciajuste, 'getRefere',array('control_name' => 'ciajuste[refere]')) ?>
  <?php $value = object_input_tag($ciajuste, 'getRefere', array (
  'size' => 20,
  'maxlength' => 25,
  'readonly'  =>   true,
  'control_name' => 'ciajuste[refere]',
  )); echo $value ? $value : '&nbsp;' ?>
&nbsp;
  <?php $value = object_input_tag($ciajuste, 'getDesing', array (
  'readonly' => true,
   'size' => 40,
  'control_name' => 'ciajuste[desing]',
)); echo $value ? $value : '&nbsp;';
}
?>

<h5><div class="sf_admin_edit_help"><?php //echo __('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.'Seleccione una referencia') ?></div></h5>