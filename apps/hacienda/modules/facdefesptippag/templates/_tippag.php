  <?php $value = object_input_tag($fctippag, 'getTippag', array (
  'readonly'  =>  $fctippag->getId()!='' ? true : false ,
  'size' => 4,
  'control_name' => 'fctippag[tippag]',
  //'onKeyPress'  => "javascript: enter(event,this.value);",
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(3,'0',0);document.getElementById('fctippag_tippag').value=valor;document.getElementById('fctippag_tippag').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>