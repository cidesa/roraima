
<?php $value = object_input_tag($indefban, 'getCodban', array (
'readonly' => true,
'size' => 4,
'maxlength' => 4,
'control_name' => 'indefban[codban]',
'onKeyPress'  => "javascript: enter(event,this.value);",
'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '#',0);document.getElementById('indefban_codban').value=valor;document.getElementById('indefban_codban').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>
