  <?php $value = object_input_tag($fcsitjurinm, 'getCodsitinm', array (
  'readonly'  =>  $fcsitjurinm->getId()!='' ? true : false ,
  'size' => 4,
  'maxlength' => 3,
  'control_name' => 'fcsitjurinm[codsitinm]',
  //'onKeyPress'  => "javascript: enter(event,this.value);",
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(3,'0',0);document.getElementById('fcsitjurinm_codsitinm').value=valor;document.getElementById('fcsitjurinm_codsitinm').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>