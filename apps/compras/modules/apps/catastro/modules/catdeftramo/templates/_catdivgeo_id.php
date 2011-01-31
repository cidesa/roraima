<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?  echo $params[2];

  $mascara=$params[0];
  $longdivgeo=$params[1];
 ?>
<br>
  <?php

   $value = object_input_tag($cattramo, 'getCoddivgeo', array (
  'size'      => $longdivgeo,
  'maxlength' => $longdivgeo,
  'readonly'  =>  $cattramo->getId()!='' ? true : false ,
  'control_name' => 'cattramo[coddivgeo]',
  'onKeyDown'    => "javascript:return dFilter (event.keyCode, this,'$mascara')",
  'onBlur'       => remote_function(array(
        'url'    => 'catdeftramo/ajax',
        'condition' => "$('cattramo_coddivgeo').value != '' && $('id').value == ''",
        'complete'  => 'AjaxJSON(request, json)',
        'with' => "'ajax=1&cajtexmos=cattramo_desdivgeo&codigo='+this.value",
        )),
   )); 	echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Catdefdivbarurb_Catdivgeo/clase/Catdivgeo/frame/sf_admin_edit_form/obj1/cattramo_coddivgeo/obj2/cattramo_desdivgeo/campo1/coddivgeo/campo2/desdivgeo/param1/'.$longdivgeo)?>

  <?php $value = object_input_tag($cattramo, 'getDesdivgeo', array (
  'size' => 40,
  'disabled' => true,
  'control_name' => 'cattramo[desdivgeo]',
)); echo $value ? $value : '&nbsp;' ?> <?php echo input_hidden_tag('cattramo[catdivgeo_id]', $cattramo->getCatdivgeoId()) ?>