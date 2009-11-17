<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

 <?php  $value = object_input_tag($rhdateva, 'getCodsup' , array (
  'size' => '10',
  'control_name' => 'rhdateva[codsup]',
  'onBlur'=> remote_function(array(
   'script' => true,
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'condition' => "$('rhdateva_codsup').value!='' && $('id').value == ''",
   'with' => "'ajax=1&cajtexmos=rhdateva_cargosup&codigo='+this.value",
      ))
)); echo $value ? $value : '&nbsp;';

echo '&nbsp;';

    echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/frame/sf_admin_edit_form/metodo/Oycregsol_nphojint/clase/Nphojint/obj1/rhdateva_codsup/obj2/rhdateva_dessup/campo1/codemp/campo2/nomemp/campo3/id/','','','botoncat');
echo '&nbsp;';

  $value = object_input_tag($rhdateva, 'getDessup', array (
  'size' => '60',
  'readonly' => true,
  'control_name' => 'rhdateva[dessup]',
)); echo $value ? $value : '&nbsp;';

