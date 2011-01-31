 <?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

  <?php
  $value = object_input_tag($fcdeclar, 'getNumref', array (
  'size' => '10',
  'maxlength' => '10',
  'readonly'  =>  $fcdeclar->getId()!='' ? true : false ,
  'control_name' => 'fcdeclar[numref]',
  'onBlur'=> remote_function(array(
        'url'      => 'facprodec/ajax',
        'script' => true,
        'condition' => "$('fcdeclar_numref').value != '' && $('id').value == ''",
        'complete' => 'AjaxJSON(request, json), cargargrid()',
        'with' => "'ajax=1&cajtexmos=fcdeclar_anoveh&codigo='+this.value",
        ))));echo $value ? $value : '&nbsp;' ;
?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Facprodec_numref/clase/Fcprolic/frame/sf_admin_edit_form/obj1/fcdeclar_numref/campo1/nrocon/')?>
