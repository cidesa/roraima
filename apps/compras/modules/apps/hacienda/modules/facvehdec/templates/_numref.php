 <?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

  <?php
  $value = object_input_tag($fcdeclar, 'getPlaveh', array (
  'size' => '10',
  'maxlength' => '10',
  'readonly'  =>  $fcdeclar->getId()!='' ? true : false ,
  'control_name' => 'fcdeclar[plaveh]',
  'onBlur'=> remote_function(array(
        'url'      => 'facvehdec/ajax',
        'script' => true,
        'condition' => "$('fcdeclar_plaveh').value != '' && $('id').value == ''",
        'complete' => 'AjaxJSON(request, json), cargargrid()',
        'with' => "'ajax=1&cajtexmos=fcdeclar_anoveh&codigo='+this.value",
        ))));echo $value ? $value : '&nbsp;' ;
?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Fcregveh_Plaveh/clase/Fcregveh/frame/sf_admin_edit_form/obj1/fcdeclar_plaveh/obj2/fcdeclar_anoveh/campo1/plaveh/campo2/anoveh/')?>

  <?php $value = object_input_tag($fcdeclar, 'getAnoveh', array (
  'size' => 40,
  'disabled' => true,
  'control_name' => 'fcdeclar[anoveh]',
)); echo $value ? $value : '&nbsp;' ?>


 <?php
/*
  echo Catalogo($fcdeclar,1,array(
	  'getprincipal' => 'getPlaveh',
	  'getsecundario' => 'getAnoveh',
	  // cajitasss
	  'campoprincipal' => 'plaveh',
	  'camposecundario' => 'anoveh',
	  'campobase' => 'id',
	  'tamanoprincipal' => '10',
	  ), 'Fcregveh_Plaveh', 'Fcregveh', '', '','divGrid','1');

	  */
	  ?>

