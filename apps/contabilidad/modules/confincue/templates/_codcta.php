<?php if ($params[0]!='') { ?>
<?php
  $mascara = $params[0];
  $long = $params[1];

  $value = object_input_tag($contabb, 'getCodcta', array (
  	'size' => $long+3,
  	'maxlength' => $long,
  	'control_name' => 'contabb[codcta]',
  	'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascara')"
 )); echo $value ? $value : '&nbsp;' ?>
<? } else { ?>
<script> alert('Debe configurar las Definiciones Específicas de la Institucion\npara poder cargar Cuentas Nuevas'); </script>
<?php } ?>
