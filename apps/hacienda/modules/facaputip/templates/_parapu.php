<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php $value = object_input_tag($fctipapu, 'getParapu', array (
'maxlength' => 8,
'style' => 'text-transform:uppercase;',
'control_name' => 'fctipapu[parapu]',
'onBlur'  => "javascript: verificar_formula();",
)); echo $value ? $value : '&nbsp;' ?>