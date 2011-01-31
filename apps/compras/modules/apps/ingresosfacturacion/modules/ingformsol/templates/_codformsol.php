
<?php $value = object_input_tag($informsol, 'getCodformsol', array (
'readonly' => true,
'size' => 4,
'maxlength' => 4,
'control_name' => 'informsol[codformsol]',
'onKeyPress'  => "javascript: enter(event,this.value);",
'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '#',0);document.getElementById('informsol_codformsol').value=valor;document.getElementById('informsol_codformsol').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>
