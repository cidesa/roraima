  <?php $value = object_input_tag($fctippro, 'getTippro', array (
  'readonly'  =>  $fctippro->getId()!='' ? true : false ,
  'size' => 4,
  'maxlength' => 4,
  'control_name' => 'fctippro[tippro]',
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4,'0',0);document.getElementById('fctippro_tippro').value=valor;document.getElementById('fctippro_tippro').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>