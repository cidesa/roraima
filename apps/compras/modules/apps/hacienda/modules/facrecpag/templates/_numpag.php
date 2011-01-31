  <?php $value = object_input_tag($fcpagos, 'getNumpag', array (
  'readonly'  =>  $fcpagos->getId()!='' ? true : false ,
  'size' => 10,
  'maxlength' => 10,
  'control_name' => 'fcpagos[numpag]',
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(10,'#',0);document.getElementById('fcpagos_numpag').value=valor;document.getElementById('fcpagos_numpag').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>