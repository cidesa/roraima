<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?  echo $params[2]; ?>
<br>
  <?php
  $mascara=$params[0];
  $longdivgeo=$params[1];

  $value = object_input_tag($catbarurb, 'getCoddivgeo', array (
  'size' => $longdivgeo,
  'maxlength' => $longdivgeo,
  'readonly'  =>  $catbarurb->getId()!='' ? true : false ,
  'control_name' => 'catbarurb[coddivgeo]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascara')",
  'onBlur'=> remote_function(array(
        'url'      => 'catdefdivbarurb/ajax',
        'script' => true,
        'condition' => "$('catbarurb_coddivgeo').value != '' && $('id').value == ''",
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=1&cajtexmos=catbarurb_desdivgeo&codigo='+this.value",
        ))));echo $value ? $value : '&nbsp;' ;
?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Catdefdivbarurb_Catdivgeo/clase/Catdivgeo/frame/sf_admin_edit_form/obj1/catbarurb_coddivgeo/obj2/catbarurb_desdivgeo/campo1/coddivgeo/campo2/desdivgeo/param1/'.$longdivgeo)?>

  <?php $value = object_input_tag($catbarurb, 'getDesdivgeo', array (
  'size' => 40,
  'disabled' => true,
  'control_name' => 'catbarurb[desdivgeo]',
)); echo $value ? $value : '&nbsp;' ?>