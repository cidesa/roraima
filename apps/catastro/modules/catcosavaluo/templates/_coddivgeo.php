<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?  echo $params[2]; ?>
<br>
  <?php
  $mascara=$params[0];
  $longdivgeo=$params[1];

  $value = object_input_tag($catcosaval, 'getCoddivgeo', array (
  'size' => $longdivgeo,
  'maxlength' => $longdivgeo,
  'readonly'  =>  $catcosaval->getId()!='' ? true : false ,
  'control_name' => 'catcosaval[coddivgeo]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascara')",
  'onBlur'=> remote_function(array(
        'url'      => 'catcosavaluo/ajax',
        'script' => true,
        'condition' => "$('catcosaval_coddivgeo').value != '' && $('id').value == ''",
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=1&cajtexmos=catcosaval_desdivgeo&codigo='+this.value",
        ))));echo $value ? $value : '&nbsp;' ;
?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Catdefdivbarurb_Catdivgeo/clase/Catdivgeo/frame/sf_admin_edit_form/obj1/catcosaval_coddivgeo/obj2/catcosaval_desdivgeo/campo1/coddivgeo/campo2/desdivgeo/param1/'.$longdivgeo)?>

  <?php $value = object_input_tag($catcosaval, 'getDesdivgeo', array (
  'size' => 40,
  'disabled' => true,
  'control_name' => 'catcosaval[desdivgeo]',
)); echo $value ? $value : '&nbsp;' ?>