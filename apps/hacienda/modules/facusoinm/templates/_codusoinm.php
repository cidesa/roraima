  <?php $value = object_input_tag($fcusoinm, 'getCodusoinm', array (
  'readonly'  =>  $fcusoinm->getId()!='' ? true : false ,
  'size' => 4,
  'maxlength' => 3,
  'control_name' => 'fcusoinm[codusoinm]',
  //'onKeyPress'  => "javascript: enter(event,this.value);",
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(3,'0',0);document.getElementById('fcusoinm_codusoinm').value=valor;document.getElementById('fcusoinm_codusoinm').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>