<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?  echo $params[2]; ?>
<br>
  <?php
  $mascara=$params[0];
  $longdivgeo=$params[1];

  $value = object_input_tag($catreginm, 'getCoddivgeo', array (
  'size' => $longdivgeo,
  'maxlength' => $longdivgeo,
  'readonly' => true,
  'control_name' => 'catreginm[coddivgeo]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascara')",
  //'onBlur'=> remote_function(array(
    //    'url'      => 'catlotinm/ajax',
      //  'script' => true,
       // 'condition' => "$('catreginm_coddivgeo').value != '' && $('id').value == ''",
        //'complete' => 'AjaxJSON(request, json)',
       // 'with' => "'ajax=1&cajtexmos2=catreginm_nomcom&cajtexmos=catreginm_desdivgeo&nrocas='+$('catreginm_nrocas').value+'&codigo='+this.value",
       // ))
        ));echo $value ? $value : '&nbsp;' ;
?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Catdefaval_Catreginm/clase/Catreginm/frame/sf_admin_edit_form/obj1/catreginm_coddivgeo/obj2/catreginm_desdivgeo/obj3/catreginm_nrocas/campo1/coddivgeo/campo2/desdivgeo/campo3/nrocas')?>

  <?php $value = object_input_tag($catreginm, 'getDesdivgeo', array (
  'size' => 40,
  'disabled' => true,
  'control_name' => 'catreginm[desdivgeo]',
)); echo $value ? $value : '&nbsp;' ?>