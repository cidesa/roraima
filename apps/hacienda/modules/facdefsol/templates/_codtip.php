  <?php $value = object_input_tag($fctipsol, 'getCodtip', array (
  'readonly'  =>  $fctipsol->getId()!='' ? true : false ,
  'size' => 4,
  'maxlength' => 2,
  'control_name' => 'fctipsol[codtip]',
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(2,'0',0);document.getElementById('fctipsol_codtip').value=valor;document.getElementById('fctipsol_codtip').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>