  <?php $value = object_input_tag($ciajuste, 'getRefaju', array (
  'readonly'  =>  $ciajuste->getId()!='' ? true : false ,
  'size' => 8,
  'maxlength' => 8,
  'control_name' => 'ciajuste[refaju]',
  //'onKeyPress'  => "javascript: enter(event,this.value);",
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(8,'0',0);document.getElementById('ciajuste_refaju').value=valor;document.getElementById('ciajuste_refaju').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>