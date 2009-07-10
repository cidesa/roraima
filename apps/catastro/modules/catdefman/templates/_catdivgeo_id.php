<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?  echo $params[2];

  $mascara=$params[0];
  $longdivgeo=$params[1];
 ?>
<br>
  <?php

   $value = object_input_tag($catman, 'getCoddivgeo', array (
  'size'      => $longdivgeo,
  'maxlength' => $longdivgeo,
  'readonly'  =>  $catman->getId()!='' ? true : false ,
  'control_name' => 'catman[coddivgeo]',
  'onKeyDown'    => "javascript:return dFilter (event.keyCode, this,'$mascara')",
  'onBlur'       => remote_function(array(
        'url'    => 'catdeftramo/ajax',
        'condition' => "$('catman_coddivgeo').value != '' && $('id').value == ''",
        'complete'  => 'AjaxJSON(request, json)',
        'with' => "'ajax=1&cajtexmos=catman_desdivgeo&codigo='+this.value",
        )),
   )); 	echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Catdefdivbarurb_Catdivgeo/clase/Catdivgeo/frame/sf_admin_edit_form/obj1/catman_desdivgeo/obj2/catman_coddivgeo/campo1/desdivgeo/campo2/coddivgeo/param1/'.$longdivgeo)?>

  <?php $value = object_input_tag($catman, 'getDesdivgeo', array (
  'size' => 40,
  'disabled' => true,
  'control_name' => 'catman[desdivgeo]',
)); echo $value ? $value : '&nbsp;' ?>