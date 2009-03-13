
<?php $value = object_input_tag($inparroquia, 'getCodpar', array (
'readonly' => true,
'size' => 4,
'maxlength' => 4,
'control_name' => 'inparroquia[codpar]',
'onKeyPress'  => "javascript: enter(event,this.value);",
'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '#',0);document.getElementById('inparroquia_codpar').value=valor;document.getElementById('inparroquia_codpar').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>
