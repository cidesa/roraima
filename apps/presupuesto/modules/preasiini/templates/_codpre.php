<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php

$masc=$cpasiini->getMascarapre();

$value = object_input_tag($cpasiini, 'getCodpre', array (
  'size' => 30,
  'maxlength' => $cpasiini->getLonpre(),
  'readonly'  =>  $cpasiini->getId()!='' ? true : false ,
  'control_name' => 'cpasiini[codpre]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$masc')",
  'onBlur'=> remote_function(array(
        'url'      => 'preasiini/ajax',
        'condition' => "$('cpasiini_codpre').value != '' && $('id').value == ''",
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=1&cajtexmos=cpasiini_nompre&cajtexcom=cpasiini_codpre&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>

<?php
if ($cpasiini->getId()=='')
echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Preasiini_Cpdeftit/clase/Cpdeftit/frame/sf_admin_edit_form/obj1/cpasiini_codpre/obj2/cpasiini_nompre/campo1/codpre/campo2/nompre','','','botoncat')?>
