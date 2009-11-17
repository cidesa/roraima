<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

 <?php  $value = object_input_tag($rhdateva, 'getCodevor' , array (
  'size' => '10',
  'control_name' => 'rhdateva[codevor]',
  'onBlur'=> remote_function(array(
   'script' => true,
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'condition' => "$('rhdateva_codevor').value!='' && $('id').value == ''",
   'with' => "'ajax=1&cajtexmos=rhdateva_cargoevor&codigo='+this.value",
      ))
)); echo $value ? $value : '&nbsp;';

echo '&nbsp;';

    echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/frame/sf_admin_edit_form/metodo/Oycregsol_nphojint/clase/Nphojint/obj1/rhdateva_codevor/obj2/rhdateva_desevor/campo1/codemp/campo2/nomemp/campo3/id/','','','botoncat');
echo '&nbsp;';

  $value = object_input_tag($rhdateva, 'getDesevor', array (
  'size' => '60',
  'readonly' => true,
  'control_name' => 'rhdateva[desevor]',
)); echo $value ? $value : '&nbsp;';

