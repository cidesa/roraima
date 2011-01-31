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
        'url'    => 'catdefman/ajax',
        'condition' => "$('catman_coddivgeo').value != '' && $('id').value == ''",
        'complete'  => 'AjaxJSON(request, json)',
        'with' => "'ajax=1&cajtexmos=catman_desdivgeo&codigo='+this.value",
        )),
   )); 	echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Catdefdivbarurb_Catdivgeo/clase/Catdivgeo/frame/sf_admin_edit_form/obj1/catman_coddivgeo/obj2/catman_desdivgeo/campo1/coddivgeo/campo2/desdivgeo/param1/'.$longdivgeo)?>

  <?php $value = object_input_tag($catman, 'getDesdivgeo', array (
  'size' => 40,
  'disabled' => true,
  'control_name' => 'catman[desdivgeo]',
)); echo $value ? $value : '&nbsp;' ?><?php echo input_hidden_tag('catman[catdivgeo_id]', $catman->getCatdivgeoId()) ?>