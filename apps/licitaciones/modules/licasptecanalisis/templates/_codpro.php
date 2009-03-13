<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

  <?php $value = object_input_tag($liasptecanalis, 'getCodpro', array (
  'size' => 20,
  'maxlength' => 16,
  'readonly'  =>  $liasptecanalis->getId()!='' ? true : false ,
  'control_name' => 'liasptecanalis[codpro]',
  'onBlur'=> remote_function(array(
       'url'      => 'licasptecanalisis/ajax',
       'script'   => true,
       'update'    =>'grid',
       'condition' => "$('liasptecanalis_codpro').value != '' && $('id').value == ''",
       'complete' => 'AjaxJSON(request, json)',
       'with' => "'ajax=2&codlic='+$('liasptecanalis_codlic').value+'&codigo='+this.value"
        ))
  )); echo $value ? $value : '&nbsp;' ?>
  &nbsp;
<?php if ($liasptecanalis->getId()=='') echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Licasplegcriterios_caprovee/clase/Caprovee/frame/sf_admin_edit_form/obj1/liasptecanalis_codpro/obj2/liasptecanalis_nompro/campo1/codpro/campo2/nompro/param1/'+$('liasptecanalis_codlic').value+'",'','','botoncat')?>

  <?php $value = object_input_tag($liasptecanalis, 'getNompro', array (
  'readonly' => true,
   'size' => 40,
  'control_name' => 'liasptecanalis[nompro]',
)); echo $value ? $value : '&nbsp;' ?>

