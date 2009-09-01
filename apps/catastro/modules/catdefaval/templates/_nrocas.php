<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

  <?php $value = object_input_tag($catdefaval, 'getNrocas', array (
  'size' => 5,
  'control_name' => 'catdefaval[nrocas]',
  'readonly'  =>  $catdefaval->getId()!='' ? true : false ,
  'onBlur'=> remote_function(array(
        'update' => 'divgrid',
        'url'      => 'catdefaval/ajax',
        'script' => true,
        'condition' => "$('catdefaval_nrocas').value != '' && $('id').value == ''",
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=2&cajtexmos='catdefaval_nomcom'&coddivgeo='+$('catdefaval_coddivgeo').value+'&codigo='+this.value",
        ))
)); echo $value ? $value : '&nbsp;' ?>