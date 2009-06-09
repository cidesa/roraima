<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php
  $value = object_input_tag($fcreginm, 'getCodcatfis', array (
  'control_name' => 'fcreginm[codcatfis]',
  'onBlur'=> remote_function(array(
        'url'      => 'facinmreg/ajax',
        'condition' => "$('fcreginm_codcatfis').value!= ''",
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=3&numero='+document.getElementById('fcreginm_rifcon').value+'&codcatfis='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>

<?php
echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Fcreginm_Fccatfis/clase/Fccatfis/frame/sf_admin_edit_form/obj1/fcreginm_codcatfis/obj2/fcreginm_nomcatfis/campo1/codcatfis/campo2/nomcatfis/param1/')?>

<?php $value = object_input_tag($fcreginm, 'getNomcatfis', array (
  'disabled' => true,
  'size' => 40,
  'control_name' => 'fcreginm[nomcatfis]',
)); echo $value ? $value : '&nbsp;' ?>
