<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

  <?php $value = object_input_tag($liasplegcrieva, 'getCodpro', array (
  'size' => 20,
  'maxlength' => 16,
  'readonly'  =>  $liasplegcrieva->getId()!='' ? true : false ,
  'control_name' => 'liasplegcrieva[codpro]',
  'onBlur'=> remote_function(array(
       'url'      => 'licasplegcriterios/ajax',
       'script'   => true,
       'update'    =>'grid',
       'condition' => "$('liasplegcrieva_codpro').value != '' && $('id').value == ''",
       'complete' => 'AjaxJSON(request, json)',
       'with' => "'ajax=2&codlic='+$('liasplegcrieva_codlic').value+'&codigo='+this.value"
        ))
  )); echo $value ? $value : '&nbsp;' ?>
  &nbsp;
<?php if ($liasplegcrieva->getId()=='') echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Licasplegcriterios_caprovee/clase/Caprovee/frame/sf_admin_edit_form/obj1/liasplegcrieva_codpro/obj2/liasplegcrieva_nompro/campo1/codpro/campo2/nompro/param1/'+$('liasplegcrieva_codlic').value+'",'','','botoncat')?>

  <?php $value = object_input_tag($liasplegcrieva, 'getNompro', array (
  'readonly' => true,
   'size' => 40,
  'control_name' => 'liasplegcrieva[nompro]',
)); echo $value ? $value : '&nbsp;' ?>

