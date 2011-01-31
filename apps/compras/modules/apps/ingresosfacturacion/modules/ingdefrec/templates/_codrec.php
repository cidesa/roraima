
<?php $value = object_input_tag($inrecaud, 'getCodrec', array (
'readonly' => true,
'size' => 4,
'maxlength' => 4,
'control_name' => 'inrecaud[codrec]',
'onKeyPress'  => "javascript: enter(event,this.value);",
'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '#',0);document.getElementById('inrecaud_codrec').value=valor;document.getElementById('inrecaud_codrec').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>
