<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?  echo $params[2]; ?>
<br>
  <?php
  $mascara=$params[0];
  $longdivgeo=$params[1];

  $value = object_input_tag($catdefaval, 'getCoddivgeo', array (
  'size' => $longdivgeo,
  'maxlength' => $longdivgeo,
  'readonly'  =>  $catdefaval->getId()!='' ? true : false ,
  'control_name' => 'catdefaval[coddivgeo]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascara')",
  'onBlur'=> remote_function(array(
        'update' => 'divgrid',
        'url'      => 'catdefaval/ajax',
        'script' => true,
        'condition' => "$('catdefaval_coddivgeo').value != '' && $('id').value == ''",
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=1&cajtexmos2=catdefaval_nomcom&cajtexmos=catdefaval_desdivgeo&nrocas='+$('catdefaval_nrocas').value+'&codigo='+this.value",
        ))));echo $value ? $value : '&nbsp;' ;
?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Catdefaval_Catreginm/clase/Catreginm/frame/sf_admin_edit_form/obj1/catdefaval_coddivgeo/obj2/catdefaval_desdivgeo/obj3/catdefaval_nrocas/campo1/coddivgeo/campo2/desdivgeo/campo3/nrocas')?>

  <?php $value = object_input_tag($catdefaval, 'getDesdivgeo', array (
  'size' => 40,
  'disabled' => true,
  'control_name' => 'catdefaval[desdivgeo]',
)); echo $value ? $value : '&nbsp;' ?>