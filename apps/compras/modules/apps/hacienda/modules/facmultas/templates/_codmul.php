  <?php $value = object_input_tag($fcmultas, 'getCodmul', array (
  'readonly'  =>  $fcmultas->getId()!='' ? true : false ,
  'size' => 5,
  'maxlength' => 4,
  'control_name' => 'fcmultas[codmul]',
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4,'0',0);document.getElementById('fcmultas_codmul').value=valor;document.getElementById('fcmultas_codmul').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>