<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php
 $masc=$fcsollic->getMascara();
 $lenmasc=strlen($fcsollic->getMascara());

 $value = object_input_tag($fcsollic, 'getCatcon', array (
  'size' => $lenmasc+2,
  'maxlength' => $lenmasc,
  //'readonly'  =>  $fcsollic->getId()!='' ? true : false ,
  'control_name' => 'fcsollic[catcon]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$masc')",
  'onBlur'=> remote_function(array(
        'url'      => 'facpicsollic/ajax',
        'condition' => "$('fcsollic_catcon').value!= ''",
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=3&codcatinm='+this.value+'&numero='+$('fcsollic_numsol').value",
        ))
)); echo $value ? $value : '&nbsp;' ?>

<?php
echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Fcreginm_Facpicsollic/clase/Fcreginm/frame/sf_admin_edit_form/obj1/fcsollic_catcon/obj2/fcsollic_desubicat/campo1/codcatinm/campo2/nomcon/param1/'.$masc,'','','botoncat')?>


<?php $value = object_input_tag($fcsollic, 'getDesubicat', array (
  'disabled' => true,
  'size' => 40,
  'control_name' => 'fcsollic[desubicat]',
)); echo $value ? $value : '&nbsp;' ?>
