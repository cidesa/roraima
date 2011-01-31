
<?php $value = object_input_tag($intipmul, 'getCodtipmul', array (
'readonly' => true,
'size' => 4,
'maxlength' => 4,
'control_name' => 'intipmul[codtipmul]',
'onKeyPress'  => "javascript: enter(event,this.value);",
'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '#',0);document.getElementById('intipmul_codtipmul').value=valor;document.getElementById('intipmul_codtipmul').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>
