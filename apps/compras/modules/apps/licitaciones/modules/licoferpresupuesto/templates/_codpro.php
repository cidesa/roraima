<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

  <?php $value = object_input_tag($lioferpre, 'getCodpro', array (
  'size' => 20,
  'maxlength' => 16,
  'readonly'  =>  $lioferpre->getId()!='' ? true : false ,
  'control_name' => 'lioferpre[codpro]',
  'onBlur'=> remote_function(array(
       'url'      => 'licoferpresupuesto/ajax',
       'script'   => true,
       'update'    =>'grid',
       'condition' => "$('lioferpre_codpro').value != '' && $('id').value == ''",
       'complete' => 'AjaxJSON(request, json)',
       'with' => "'ajax=2&codlic='+$('lioferpre_codlic').value+'&codigo='+this.value"
        ))
  )); echo $value ? $value : '&nbsp;' ?>
  &nbsp;
<?php if ($lioferpre->getId()=='') echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Licasplegcriterios_caprovee/clase/Caprovee/frame/sf_admin_edit_form/obj1/lioferpre_codpro/obj2/lioferpre_nompro/campo1/codpro/campo2/nompro/param1/'+$('lioferpre_codlic').value+'",'','','botoncat')?>

  <?php $value = object_input_tag($lioferpre, 'getNompro', array (
  'readonly' => true,
   'size' => 40,
  'control_name' => 'lioferpre[nompro]',
)); echo $value ? $value : '&nbsp;' ?>

