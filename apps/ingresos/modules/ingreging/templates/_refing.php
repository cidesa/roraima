  <?php $value = object_input_tag($cireging, 'getRefing', array (
  'readonly'  =>  $cireging->getId()!='' ? true : false ,
  'size' => 12,
  'control_name' => 'cireging[refing]',
  //'onKeyPress'  => "javascript: enter(event,this.value);",
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(8,'0',0);document.getElementById('cireging_refing').value=valor;document.getElementById('cireging_refing').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>