<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php
if ($cireging->getId()){

 echo object_input_hidden_tag($cireging, 'getTipmov',array('control_name' => 'cireging[tipmov]')) ?>
  <?php $value = object_input_tag($cireging, 'getTipmov', array (
  'size' => 10,
  'maxlength' => 16,
  'readonly'  =>   true,
  'control_name' => 'cireging[tipmov]',
  )); echo $value ? $value : '&nbsp;' ?>
&nbsp;
  <?php $value = object_input_tag($cireging, 'getDestipmov', array (
  'readonly' => true,
   'size' => 40,
  'control_name' => 'cireging[destipmov]',
)); echo $value ? $value : '&nbsp;';

}else{
  echo Catalogo($cireging,1,array(
  'getprincipal' => 'getCodtip',
  'getsecundario' => 'getDestip',
  'campoprincipal' => 'tipmov',
  'camposecundario' => 'destipmov',
  'campobase' => 'tstipmov_id'
  ), 'Ingreging_tstipmov', 'tstipmov');

}
?>
