
<?php $value = object_input_tag($intipemp, 'getCodtipemp', array (
'readonly' => true,
'size' => 4,
'maxlength' => 4,
'control_name' => 'intipemp[codtipemp]',
'onKeyPress'  => "javascript: enter(event,this.value);",
'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '#',0);document.getElementById('intipemp_codtipemp').value=valor;document.getElementById('intipemp_codtipemp').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>
