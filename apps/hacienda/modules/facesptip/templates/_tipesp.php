  <?php $value = object_input_tag($fctipesp, 'getTipesp', array (
  'readonly'  =>  $fctipesp->getId()!='' ? true : false ,
  'size' => 4,
  'control_name' => 'fctipesp[tipesp]',
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(3,'0',0);document.getElementById('fctipesp_tipesp').value=valor;document.getElementById('fctipesp_tipesp').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>