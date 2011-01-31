
<?php $value = object_input_tag($inmunicipio, 'getCodmun', array (
'readonly' => true,
'size' => 4,
'maxlength' => 4,
'control_name' => 'inmunicipio[codmun]',
'onKeyPress'  => "javascript: enter(event,this.value);",
'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '#',0);document.getElementById('inmunicipio_codmun').value=valor;document.getElementById('inmunicipio_codmun').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>
