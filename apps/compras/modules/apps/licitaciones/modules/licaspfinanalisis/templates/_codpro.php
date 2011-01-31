<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

  <?php $value = object_input_tag($liaspfinanalis, 'getCodpro', array (
  'size' => 20,
  'maxlength' => 16,
  'readonly'  =>  $liaspfinanalis->getId()!='' ? true : false ,
  'control_name' => 'liaspfinanalis[codpro]',
  'onBlur'=> remote_function(array(
       'url'      => 'licaspfinanalisis/ajax',
       'script'   => true,
       'update'    =>'grid',
       'condition' => "$('liaspfinanalis_codpro').value != '' && $('id').value == ''",
       'complete' => 'AjaxJSON(request, json)',
       'with' => "'ajax=2&codlic='+$('liaspfinanalis_codlic').value+'&codigo='+this.value"
        ))
  )); echo $value ? $value : '&nbsp;' ?>
  &nbsp;
<?php if ($liaspfinanalis->getId()=='') echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Licasplegcriterios_caprovee/clase/Caprovee/frame/sf_admin_edit_form/obj1/liaspfinanalis_codpro/obj2/liaspfinanalis_nompro/campo1/codpro/campo2/nompro/param1/'+$('liaspfinanalis_codlic').value+'",'','','botoncat')?>

  <?php $value = object_input_tag($liaspfinanalis, 'getNompro', array (
  'readonly' => true,
   'size' => 40,
  'control_name' => 'liaspfinanalis[nompro]',
)); echo $value ? $value : '&nbsp;' ?>

