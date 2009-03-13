<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php echo object_input_hidden_tag($licalvan, 'getLireglicId',array('control_name' => 'licalvan[lireglic_id]')) ?>
  <?php $value = object_input_tag($licalvan, 'getCodlic', array (
  'size' => 20,
  'maxlength' => 16,
  'readonly'  =>  $licalvan->getId()!='' ? true : false ,
  'control_name' => 'licalvan[codlic]',
  'onBlur'=> remote_function(array(
       'url'      => 'liccalculovan/ajax',
       'script'   => true,
       'update'      => 'grid',
       'condition' => "$('licalvan_codlic').value != '' && $('id').value == ''",
       'complete' => 'AjaxJSON(request, json)',
       'with' => "'ajax=1&codigo='+this.value"
        ))
  )); echo $value ? $value : '&nbsp;' ?>
<?php if ($licalvan->getId()=='') echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Liemppar_licreglic/clase/Lireglic/frame/sf_admin_edit_form/obj1/licalvan_codlic/obj2/licalvan_deslic/campo1/codlic/campo2/deslic",'','','botoncat')?>

  <?php $value = object_input_tag($licalvan, 'getDeslic', array (
  'readonly' => true,
   'size' => 40,
  'control_name' => 'licalvan[deslic]',
)); echo $value ? $value : '&nbsp;' ?>

