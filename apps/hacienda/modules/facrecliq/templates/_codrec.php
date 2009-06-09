  <?php $value = object_input_tag($fcdefrecint, 'getCodrec', array (
  'readonly'  =>  $fcdefrecint->getId()!='' ? true : false ,
  'size' => 12,
  'maxlength' => 4,
  'control_name' => 'fcdefrecint[codrec]',
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4,'0',0);document.getElementById('fcdefrecint_codrec').value=valor;document.getElementById('fcdefrecint_codrec').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>