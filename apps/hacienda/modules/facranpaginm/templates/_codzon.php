<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>
<?php
echo input_tag('fcvalinm[codzon]', $fcvalinm->getCodzon(), array (
 'size' => 10,
 'maxlength' => 3,
 'control_name' => 'fcvalinm[codzon]',
 'onBlur'=> remote_function(array(
 	'update'   => 'grid',
 	'condition' => "$('fcvalinm_codzon').value != '' && $('id').value == ''",
 	'url' => 'facranpaginm/ajax',
 	'with' => "'ajax=1&codigo='+this.value",
 	'complete' => 'AjaxJSON(request, json)',
 ))));?>