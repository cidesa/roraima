<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>
<?php
echo input_tag('fcdprinm[anovig]', $fcdprinm->getAnovig(), array (
 'size' => 10,
 'maxlength' => 4,
 'control_name' => 'fcdprinm[anovig]',
 'onBlur'=> remote_function(array(
 	'update'   => 'grid',
 	'condition' => "$('fcdprinm_anovig').value != ''",
 	'url' => 'facdefdprinm/ajax',
 	'with' => "'ajax=1&codigo='+this.value",
 	'complete' => 'AjaxJSON(request, json)',
 ))));?>