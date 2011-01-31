  <?php $value = object_input_tag($fctipesp, 'getTipesp', array (
  'readonly'  =>  $fctipesp->getId()!='' ? true : false ,
  'size' => 12,
  'maxlength' => 10,
  'control_name' => 'fctipesp[tipesp]',
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(10,'0',0);document.getElementById('fctipesp_tipesp').value=valor;document.getElementById('fctipesp_tipesp').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>