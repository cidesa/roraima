
<?php $value = object_input_tag($infactura, 'getNumfac', array (
'readonly' => true,
'size' => 12,
'maxlength' => 12,
'control_name' => 'infactura[numfac]',
'onKeyPress'  => "javascript: enter(event,this.value);",
'onBlur'  => "javascript: valor=this.value; valor=valor.pad(12, '#',0);document.getElementById('infactura_numfac').value=valor;document.getElementById('infactura_numfac').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>


