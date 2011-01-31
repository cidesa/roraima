
<?php $value = object_input_tag($inestado, 'getCodedo', array (
//'readonly' => true,
'size' => 4,
'maxlength' => 4,
'control_name' => 'inestado[codedo]',
'onKeyPress'  => "javascript: enter(event,this.value);",
'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4,'#',0);document.getElementById('inestado_codedo').value=valor;document.getElementById('inestado_codedo').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>
