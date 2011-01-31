<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

  <?php $value = object_input_tag($liressol, 'getCodempemi', array (
  'size' => 20,
  'maxlength' => 16,
  'control_name' => 'liressol[codempemi]',
  'onBlur'=> remote_function(array(
       'url'      => 'licressol/ajax',
       'script'   => true,
       'condition' => "$('liressol_codempemi').value != '' && $('id').value == ''",
       'complete' => 'AjaxJSON(request, json)',
       'with' => "'ajax=3&codigo='+this.value"
        ))
  )); echo $value ? $value : '&nbsp;' ?>
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Nphojint_Nomasicarconnom/clase/Nphojint/frame/sf_admin_edit_form/obj1/liressol_codempemi/obj2/liressol_nomempemi/campo1/codemp/campo2/nomemp",'','','botoncat')?>

  <?php $value = object_input_tag($liressol, 'getNomempemi', array (
  'disabled' => true,
   'size' => 40,
  'control_name' => 'liressol[nomempemi]',
)); echo $value ? $value : '&nbsp;' ?>

