<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php
  $mascara = $params[0];
  $long = $params[1];

  $value = object_input_tag($cpdeftit, 'getCodpre', array (
  'size' => $long+3,
  'maxlength' => $long,
  'control_name' => 'cpdeftit[codpre]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascara')",
  'onBlur'=> remote_function(array(
        'update' => 'divgrid',
        'url'      => 'preejeglo/ajax',
        'script' => true,
        'condition' => "$('cpdeftit_codpre').value != ''",
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=1&perpre='+$('cpdeftit_perpre').value+'&cajtexmos=cpdeftit_nompre&codigo='+this.value",
        ))));echo $value ? $value : '&nbsp;' ;
?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Preasiini_Cpdeftit/clase/Cpdeftit/frame/sf_admin_edit_form/obj1/cpdeftit_codpre/obj2/cpdeftit_nompre/campo1/codpre/campo2/nompre')?>

  <?php $value = object_input_tag($cpdeftit, 'getNompre', array (
  'size' => 40,
  'disabled' => true,
  'control_name' => 'cpdeftit[nompre]',
)); echo $value ? $value : '&nbsp;' ?>