  <?php $value = object_input_tag($fcrutas, 'getCodrut', array (
  'readonly'  =>  $fcrutas->getId()!='' ? true : false ,
  'size' => 12,
  'maxlength' => 6,
  'control_name' => 'fcrutas[codrut]',
  //'onKeyPress'  => "javascript: enter(event,this.value);",
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(6,'0',0);document.getElementById('fcrutas_codrut').value=valor;document.getElementById('fcrutas_codrut').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>