  <?php $value = object_input_tag($fcdefdesc, 'getCoddes', array (
  'readonly'  =>  $fcdefdesc->getId()!='' ? true : false ,
  'size' => 12,
  'control_name' => 'fcdefdesc[coddes]',
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4,'0',0);document.getElementById('fcdefdesc_coddes').value=valor;document.getElementById('fcdefdesc_coddes').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>