
<?php $value = object_input_tag($inespeci, 'getCodespeci', array (
'readonly' => true,
'size' => 4,
'maxlength' => 4,
'control_name' => 'inespeci[codespeci]',
'onKeyPress'  => "javascript: enter(event,this.value);",
'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '#',0);document.getElementById('inespeci_codespeci').value=valor;document.getElementById('inespeci_codespeci').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>
