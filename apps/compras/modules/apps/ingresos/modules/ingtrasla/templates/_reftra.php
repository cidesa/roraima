  <?php $value = object_input_tag($citrasla, 'getReftra', array (
  'readonly'  =>  $citrasla->getId()!='' ? true : false ,
  'size' => 12,
  'control_name' => 'citrasla[reftra]',
  //'onKeyPress'  => "javascript: enter(event,this.value);",
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(8,'0',0);document.getElementById('citrasla_reftra').value=valor;document.getElementById('citrasla_reftra').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>