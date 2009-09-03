<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

  <?php $value = object_input_tag($catreginm, 'getNrocas', array (
  'size' => 5,
  'readonly' => true,
  'control_name' => 'catreginm[nrocas]',
 // 'onBlur'=> remote_function(array(
   //     'url'      => 'catlotinm/ajax',
     //   'script' => true,
       // 'condition' => "$('catreginm_nrocas').value != ''",
       // 'complete' => 'AjaxJSON(request, json)',
       // 'with' => "'ajax=2&coddivgeo='+$('catreginm_coddivgeo').value+'&codigo='+this.value",
       // ))
)); echo $value ? $value : '&nbsp;' ?>