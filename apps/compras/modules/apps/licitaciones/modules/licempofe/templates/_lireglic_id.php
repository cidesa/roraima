<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php echo object_input_hidden_tag($liempofe, 'getLireglicId',array('control_name' => 'liempofe[lireglic_id]')) ?>
  <?php $value = object_input_tag($liempofe, 'getCodlic', array (
  'size' => 20,
  'maxlength' => 16,
  'readonly'  =>  $liempofe->getId()!='' ? true : false ,
  'control_name' => 'liempofe[codlic]',
  'onBlur'=> remote_function(array(
       'url'      => 'licempofe/ajax',
       'script'   => true,
       'update'      => 'grid',
       'condition' => "$('liempofe_codlic').value != '' && $('id').value == ''",
       'complete' => 'AjaxJSON(request, json)',
       'with' => "'ajax=1&codigo='+this.value"
        ))
  )); echo $value ? $value : '&nbsp;' ?>
<?php if ($liempofe->getId()=='') echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Liemppar_licreglic/clase/Lireglic/frame/sf_admin_edit_form/obj1/liempofe_codlic/obj2/liempofe_deslic/campo1/codlic/campo2/deslic",'','','botoncat')?>

  <?php $value = object_input_tag($liempofe, 'getDeslic', array (
  'readonly' => true,
   'size' => 40,
  'control_name' => 'liempofe[deslic]',
)); echo $value ? $value : '&nbsp;' ?>

