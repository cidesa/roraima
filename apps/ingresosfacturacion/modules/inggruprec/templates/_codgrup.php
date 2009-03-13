
<?php $value = object_input_tag($ingruprec, 'getCodgrup', array (
'readonly' => true,
'size' => 4,
'maxlength' => 4,
'control_name' => 'ingruprec[codgrup]',
'onKeyPress'  => "javascript: enter(event,this.value);",
'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '#',0);document.getElementById('ingruprec_codgrup').value=valor;document.getElementById('ingruprec_codgrup').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>
