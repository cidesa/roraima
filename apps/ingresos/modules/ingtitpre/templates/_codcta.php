<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php echo javascript_include_tag('dFilter') ?>

  <?php
  $mascara=$cideftit->getMascaraConta();
  $value = object_input_tag($cideftit, 'getCodcta', array (
  'size' => 20,
  'maxlength' => $cideftit->getLoncta(),
  //'readonly'  =>  $cideft->getId()!='' ? true : false ,
  'control_name' => 'cideftit[codcta]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascara')",
  'onBlur'=> remote_function(array(
        'url'      => 'ingtitpre/ajax',
        'condition' => "$('cideftit_codcta').value != '' && $('id').value == ''",
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=2&cajtexmos=cideftit_descta&codigo='+this.value",
        ))));echo $value ? $value : '&nbsp;' ;
?>
&nbsp;<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Ingtitpre_contabb/clase/Contabb/frame/sf_admin_edit_form/obj1/cideftit_codcta/obj2/cideftit_descta/campo1/codcta/campo2/descta','','','botoncat')?>
<?php $value = object_input_tag($cideftit, 'getDescta', array (
  'disabled' => true,
  'size' => 40,
  'control_name' => 'cideftit[descta]',
)); echo $value ? $value : '&nbsp;' ?>

