  <?php $value = object_input_tag($ciadidis, 'getRefadi', array (
  'readonly'  =>  $ciadidis->getId()!='' ? true : false ,
  'size' => 12,
  'control_name' => 'ciadidis[refadi]',
  //'onKeyPress'  => "javascript: enter(event,this.value);",
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(8,'0',0);document.getElementById('ciadidis_refadi').value=valor;document.getElementById('ciadidis_refadi').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>