
<?php $value = object_input_tag($intipprof, 'getCodtipprof', array (
'readonly' => true,
'size' => 4,
'maxlength' => 4,
'control_name' => 'intipprof[codtipprof]',
'onKeyPress'  => "javascript: enter(event,this.value);",
'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '#',0);document.getElementById('intipprof_codtipprof').value=valor;document.getElementById('intipprof_codtipprof').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>
