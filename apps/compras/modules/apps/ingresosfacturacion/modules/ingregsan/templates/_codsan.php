
<?php $value = object_input_tag($insancion, 'getCodsan', array (
'readonly' => true,
'size' => 4,
'maxlength' => 4,
'control_name' => 'insancion[codsan]',
'onKeyPress'  => "javascript: enter(event,this.value);",
'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '#',0);document.getElementById('insancion_codsan').value=valor;document.getElementById('insancion_codsan').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>
