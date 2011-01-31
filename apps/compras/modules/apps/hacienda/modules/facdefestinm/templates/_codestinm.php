  <?php $value = object_input_tag($fcestinm, 'getCodestinm', array (
  'readonly'  =>  $fcestinm->getId()!='' ? true : false ,
  'size' => 12,
  'maxlength' => 6,
  'control_name' => 'fcestinm[codestinm]',
  //'onKeyPress'  => "javascript: enter(event,this.value);",
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(6,'0',0);document.getElementById('fcestinm_codestinm').value=valor;document.getElementById('fcestinm_codestinm').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>