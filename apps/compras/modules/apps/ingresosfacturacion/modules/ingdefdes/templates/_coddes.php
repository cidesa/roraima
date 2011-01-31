
<?php $value = object_input_tag($indefdes, 'getCoddes', array (
'readonly' => true,
'size' => 4,
'maxlength' => 4,
'control_name' => 'indefdes[coddes]',
'onKeyPress'  => "javascript: enter(event,this.value);",
'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '#',0);document.getElementById('indefdes_coddes').value=valor;document.getElementById('indefdes_coddes').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>
