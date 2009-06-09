  <?php $value = object_input_tag($fccarinm, 'getCodcarinm', array (
  'readonly'  =>  $fccarinm->getId()!='' ? true : false ,
  'size' => 4,
  'maxlength' => 3,
  'control_name' => 'fccarinm[codcarinm]',
  //'onKeyPress'  => "javascript: enter(event,this.value);",
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(3,'0',0);document.getElementById('fccarinm_codcarinm').value=valor;document.getElementById('fccarinm_codcarinm').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>