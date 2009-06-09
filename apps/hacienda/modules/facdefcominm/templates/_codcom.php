  <?php $value = object_input_tag($fccominm, 'getCodcom', array (
  'readonly'  =>  $fccominm->getId()!='' ? true : false ,
  'size' => 12,
  'maxlength' => 6,
  'control_name' => 'fccominm[codcom]',
  //'onKeyPress'  => "javascript: enter(event,this.value);",
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(6,'0',0);document.getElementById('fccominm_codcom').value=valor;document.getElementById('fccominm_codcom').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>