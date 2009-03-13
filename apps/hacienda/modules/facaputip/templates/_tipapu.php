  <?php $value = object_input_tag($fctipapu, 'getTipapu', array (
  'readonly'  =>  $fctipapu->getId()!='' ? true : false ,
  'size' => 4,
  'control_name' => 'fctipapu[tipapu]',
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(3,'0',0);document.getElementById('fctipapu_tipapu').value=valor;document.getElementById('fctipapu_tipapu').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>