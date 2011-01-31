<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?  echo $params[2]; ?>
<br>
  <?php
  $mascara=$params[0];
  $longdivgeo=$params[1];

  $value = object_input_tag($catreginm, 'getCoddivgeo', array (
  'size' => $longdivgeo,
  'maxlength' => $longdivgeo,
  'readonly'  =>  $catreginm->getId()!='' ? true : false ,
  'control_name' => 'catreginm[coddivgeo]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascara')",
  'onBlur'=> remote_function(array(
        'url'      => 'catreginm/ajax',
        'script' => true,
        'condition' => "$('catreginm_coddivgeo').value != '' && $('id').value == ''",
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=1&cajtexmos=catreginm_desdivgeo&codigo='+this.value",
        ))));echo $value ? $value : '&nbsp;' ;
?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Catdefdivbarurb_Catdivgeo/clase/Catdivgeo/frame/sf_admin_edit_form/obj1/catreginm_desdivgeo/obj2/catreginm_coddivgeo/campo1/desdivgeo/campo2/coddivgeo/param1/'.$longdivgeo)?>

  <?php $value = object_input_tag($catreginm, 'getDesdivgeo', array (
  'size' => 40,
  'disabled' => true,
  'control_name' => 'catreginm[desdivgeo]',
)); echo $value ? $value : '&nbsp;' ?>