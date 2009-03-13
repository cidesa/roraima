<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

  <?php $value = object_input_tag($liressol, 'getCodempfir', array (
  'size' => 20,
  'maxlength' => 16,
  'control_name' => 'liressol[codempfir]',
  'onBlur'=> remote_function(array(
       'url'      => 'licressol/ajax',
       'script'   => true,
       'condition' => "$('liressol_codempfir').value != '' && $('id').value == ''",
       'complete' => 'AjaxJSON(request, json)',
       'with' => "'ajax=2&codigo='+this.value"
        ))
  )); echo $value ? $value : '&nbsp;' ?>
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Nphojint_Nomasicarconnom/clase/Nphojint/frame/sf_admin_edit_form/obj1/liressol_codempfir/obj2/liressol_nomempfir/campo1/codemp/campo2/nomemp",'','','botoncat')?>

  <?php $value = object_input_tag($liressol, 'getNomempfir', array (
  'disabled' => true,
   'size' => 40,
  'control_name' => 'liressol[nomempfir]',
)); echo $value ? $value : '&nbsp;' ?>

