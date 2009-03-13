
<?php $value = object_input_tag($inmulta, 'getCodmul', array (
'readonly' => true,
'size' => 4,
'maxlength' => 4,
'control_name' => 'inmulta[codmul]',
'onKeyPress'  => "javascript: enter(event,this.value);",
'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '#',0);document.getElementById('inmulta_codmul').value=valor;document.getElementById('inmulta_codmul').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>
